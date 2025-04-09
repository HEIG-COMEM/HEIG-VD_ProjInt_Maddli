<script setup lang="ts">
import AppUserCard from '@/components/admin/AppUserCard.vue';
import { H3 } from '@/components/typography/headings';
import { Button } from '@/components/ui/button';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import { Sheet, SheetContent, SheetDescription, SheetHeader, SheetTitle, SheetTrigger } from '@/components/ui/sheet';
import { formatRoles } from '@/composables/useFormat';
import { availableLicence } from '@/stores/admin/availableLicenceStore';
import { useForm } from '@inertiajs/vue3';
import { useFetch } from '@vueuse/core';
import { Undo2 } from 'lucide-vue-next';
import { watchEffect } from 'vue';
import { toast } from 'vue-sonner';

const props = defineProps<{
    title: string;
    description: string;
    userId: number;
}>();

const {
    execute: executeFetch,
    isFetching,
    error,
    data,
} = useFetch(route('club.admin.user', { id: props.userId, json: true }), {
    refetch: true,
}).json();

const licenceForm = useForm({
    licence: 0,
});

const handleLicenceChange = () => {
    if (licenceForm.licence === 0) {
        return licenceForm.setError('licence', 'Licence is required');
    }
    licenceForm.post(route('club.admin.user.licence', { id: props.userId }), {
        onSuccess: () => {
            executeFetch();
            toast.success('Licence updated successfully');
        },
        onError: (error) => {
            toast.error('Error updating licence');
            console.error(error);
        },
        preserveScroll: true,
    });
};

watchEffect(() => {
    if (data.value) {
        licenceForm.defaults = 'licence' in data.value ? data.value.licence : 0;
    }
});
</script>

<template>
    <Sheet>
        <SheetTrigger>
            <slot name="trigger" />
        </SheetTrigger>
        <SheetContent class="!w-full sm:!w-[50vw] sm:!max-w-[50vw]">
            <SheetHeader>
                <SheetTitle>{{ title }}</SheetTitle>
                <SheetDescription>
                    {{ description }}
                </SheetDescription>
                <div class="mt-12">
                    <div v-if="isFetching">Loading...</div>
                    <div v-else-if="error">Error: {{ error.message }}</div>
                    <div v-else class="flex w-full flex-col gap-8">
                        <AppUserCard :email="data.email" :name="data.name" :user-id="data.id" class="!max-w-full">
                            <template #content>
                                <div class="flex flex-col gap-4">
                                    <div class="flex flex-row items-center justify-start gap-2" v-if="data.roles">
                                        <span class="text-sm font-bold">Role(s):</span>
                                        <span class="text-sm">{{ formatRoles(data.roles) }}</span>
                                    </div>
                                    <div class="flex flex-row items-center justify-start gap-2">
                                        <span class="text-sm font-bold">Coaching licence:</span>
                                        <span class="text-sm">{{ data.licence?.name ?? 'none' }}</span>
                                    </div>
                                </div>
                            </template>
                        </AppUserCard>
                        <div class="flex flex-col gap-4">
                            <H3>Adjust the licence</H3>
                            <Select v-model="licenceForm.licence">
                                <SelectTrigger>
                                    <SelectValue :placeholder="data.licence?.name ?? 'None'" />
                                </SelectTrigger>
                                <SelectContent>
                                    <SelectItem :value="-1"> None </SelectItem>
                                    <SelectItem v-for="licence in availableLicence.availableLicences" :key="licence.value" :value="licence.value">
                                        {{ licence.label }}
                                    </SelectItem>
                                </SelectContent>
                            </Select>
                            <div class="flex w-full flex-row gap-2">
                                <Button class="flex-grow" :disabled="!licenceForm.isDirty" @click="handleLicenceChange()"> Change licence </Button>
                                <Button variant="destructive" size="icon" :disabled="!licenceForm.isDirty" @click="licenceForm.reset()">
                                    <Undo2 />
                                </Button>
                            </div>
                        </div>
                    </div>
                </div>
            </SheetHeader>
        </SheetContent>
    </Sheet>
</template>

<style scoped></style>
