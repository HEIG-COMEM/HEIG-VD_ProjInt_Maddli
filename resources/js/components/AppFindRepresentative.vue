<script lang="ts" setup>
import AppContactCard from '@/components/AppContactCard.vue';
import InputError from '@/components/InputError.vue';
import { H3 } from '@/components/typography/headings';
import { P } from '@/components/typography/texts';
import { Button } from '@/components/ui/button';
import { Dialog, DialogContent, DialogDescription, DialogHeader, DialogTitle, DialogTrigger } from '@/components/ui/dialog';
import {
    Drawer,
    DrawerClose,
    DrawerContent,
    DrawerDescription,
    DrawerFooter,
    DrawerHeader,
    DrawerTitle,
    DrawerTrigger,
} from '@/components/ui/drawer';
import { Label } from '@/components/ui/label';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import { formatRoles, ucFirst } from '@/composables/useFormat';
import { useForm } from '@inertiajs/vue3';
import { createReusableTemplate, useAsyncState, useFetch, useMediaQuery } from '@vueuse/core';
import { Loader2 } from 'lucide-vue-next';
import { ref, watchEffect } from 'vue';

const props = withDefaults(
    defineProps<{
        title: string;
        description: string;
        saveLabel?: string;
        role?: string;
    }>(),
    {
        saveLabel: 'Save changes',
        role: 'ambassador',
    },
);

const form = useForm({
    countryCode: '',
    clubId: '',
});

const isLoading = ref(false);

interface Representative {
    representative: {
        id: number;
        name: string;
        email: string;
        email_verified_at: string;
        birth_date: string;
        licence_id: number;
        created_at: string;
        updated_at: string;
        roles: Array<{
            id: number;
            name: string;
            created_at: string;
            updated_at: string;
            pivot: {
                user_id: number;
                role_id: number;
            };
        }>;
    };
    matchBy: string;
}

const representativeData = ref<Representative | null>(null);

const submit = async () => {
    isLoading.value = true;
    form.errors.countryCode = !form.countryCode ? 'Country is required' : '';
    form.errors.clubId = !form.clubId ? 'Club is required' : '';

    if (!form.countryCode || !form.clubId) return (isLoading.value = false);

    form.countryCode = form.countryCode === 'other' ? '' : form.countryCode;
    form.clubId = form.clubId === 'other' ? '' : form.clubId;

    try {
        const response = await fetch(
            route('club.api.find-representative', { countryCode: form.countryCode, clubId: form.clubId, role: props.role }),
            {
                headers: {
                    'Content-Type': 'application/json',
                },
            },
        );
        const data = await response.json();
        representativeData.value = data;
    } catch (error) {
        console.error('Error fetching representative:', error);
    } finally {
        isLoading.value = false;
    }
};

const {
    isFetching: countriesIsFetching,
    error: countriesError,
    data: countriesResponse,
} = useFetch(route('club.api.countries'), {
    refetch: true,
}).json();

const {
    state: clubsResponse,
    isLoading: clubsIsFetching,
    error: clubsError,
    execute: fetchClubs,
} = useAsyncState(
    () => fetch(route('club.api.clubs', { countryCode: form.countryCode })).then((res) => res.json()),
    { clubs: [] },
    { immediate: false },
);

watchEffect(() => {
    if (form.countryCode) {
        fetchClubs();
    }
});

// Reuse `form` section
const [UseTemplate, GridForm] = createReusableTemplate();
const isDesktop = useMediaQuery('(min-width: 768px)');

const isOpen = ref(false);
</script>

<template>
    <UseTemplate>
        <form v-if="!representativeData" class="grid items-start gap-4 px-4" @submit.prevent="submit">
            <div class="grid gap-2">
                <Label html-for="country">Where are you from ?</Label>
                <Select v-model="form.countryCode">
                    <SelectTrigger>
                        <SelectValue placeholder="Select a country" id="country" aria-required="true" />
                    </SelectTrigger>
                    <SelectContent>
                        <SelectItem v-if="countriesIsFetching" value="loading" disabled>Loading...</SelectItem>
                        <SelectItem v-if="countriesError" value="error" disabled>Error loading countries</SelectItem>
                        <SelectItem v-if="!countriesResponse.countries.length" value="empty" disabled>No countries found</SelectItem>
                        <SelectItem value="other">Other</SelectItem>
                        <SelectItem v-for="country in countriesResponse.countries" :key="country.id" :value="country.code">
                            {{ country.name }}
                        </SelectItem>
                    </SelectContent>
                </Select>
                <InputError :message="form.errors.countryCode" />
            </div>
            <div class="grid gap-2">
                <Label html-for="club">Are you active in a club ?</Label>
                <Select v-model="form.clubId" :disabled="!form.countryCode">
                    <SelectTrigger>
                        <SelectValue placeholder="Select a club" id="club" aria-required="true" />
                    </SelectTrigger>
                    <SelectContent v-if="form.countryCode">
                        <SelectItem v-if="clubsIsFetching" value="loading" disabled>Loading...</SelectItem>
                        <SelectItem v-if="clubsError" value="error" disabled>Error loading clubs</SelectItem>
                        <SelectItem v-if="!clubsResponse.clubs.length" value="empty" disabled>No clubs found</SelectItem>
                        <SelectItem value="other">Other</SelectItem>
                        <SelectItem v-for="club in clubsResponse.clubs" :key="club.id" :value="club.id">
                            {{ club.name }}
                        </SelectItem>
                    </SelectContent>
                </Select>
                <InputError :message="form.errors.clubId" />
            </div>
            <Button type="submit" :disabled="isLoading" class="w-full">
                <Loader2 class="mr-2 h-4 w-4 animate-spin" v-if="isLoading" />
                {{ isLoading ? 'Loading...' : saveLabel }}
            </Button>
        </form>
        <div v-else class="px-4">
            <div class="mb-4">
                <H3>Great news !</H3>
                <P class="!mt-0"
                    >We have found a match !
                    <template v-if="representativeData.matchBy !== 'random'">She is in the same {{ representativeData.matchBy }} as you.</template></P
                >
            </div>
            <AppContactCard
                :user-id="representativeData.representative.id"
                :name="representativeData.representative.name"
                :role="formatRoles(representativeData.representative?.roles || []) || ucFirst(props.role)"
                :email="representativeData.representative.email"
            ></AppContactCard>
        </div>
    </UseTemplate>

    <Dialog v-if="isDesktop" v-model:open="isOpen">
        <DialogTrigger as-child>
            <slot name="trigger">
                <Button variant="outline">Open</Button>
            </slot>
        </DialogTrigger>
        <DialogContent class="sm:max-w-[425px]">
            <DialogHeader>
                <DialogTitle>{{ title }}</DialogTitle>
                <DialogDescription>{{ description }}</DialogDescription>
            </DialogHeader>
            <GridForm />
        </DialogContent>
    </Dialog>

    <Drawer v-else v-model:open="isOpen">
        <DrawerTrigger as-child>
            <slot name="trigger">
                <Button variant="outline">Open</Button>
            </slot>
        </DrawerTrigger>
        <DrawerContent>
            <DrawerHeader class="text-left">
                <DrawerTitle>{{ title }}</DrawerTitle>
                <DrawerDescription>{{ description }}</DrawerDescription>
            </DrawerHeader>
            <GridForm />
            <DrawerFooter class="pt-2">
                <DrawerClose as-child>
                    <Button variant="outline"> Cancel </Button>
                </DrawerClose>
            </DrawerFooter>
        </DrawerContent>
    </Drawer>
</template>
