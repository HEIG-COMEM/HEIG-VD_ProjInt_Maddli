<script setup lang="ts">
import AddCoach from '@/components/admin/AddCoach.vue';
import AddManager from '@/components/admin/AddManager.vue';
import AppUserCard from '@/components/admin/AppUserCard.vue';
import { H3 } from '@/components/typography/headings';
import { Muted } from '@/components/typography/texts';
import { Button } from '@/components/ui/button';
import { ScrollArea, ScrollBar } from '@/components/ui/scroll-area';
import { Sheet, SheetContent, SheetDescription, SheetHeader, SheetTitle, SheetTrigger } from '@/components/ui/sheet';
import { router } from '@inertiajs/vue3';
import { useFetch } from '@vueuse/core';
import { X } from 'lucide-vue-next';
import { toast } from 'vue-sonner';

const props = defineProps<{
    title: string;
    description: string;
    clubId: number;
}>();

const {
    execute: executeFetch,
    isFetching,
    error,
    data,
} = useFetch(route('club.admin.club', { id: props.clubId, json: true }), {
    refetch: true,
}).json();

const removeCoach = ({ clubId, userId }: { clubId: number; userId: number }) => {
    router.delete(route('club.admin.club.coaches', { clubId, userId }), {
        onSuccess: () => {
            executeFetch();
            toast.success('Coach removed successfully');
        },
        onError: (error) => {
            toast.error('Error removing coach');
            console.error(error);
        },
        preserveScroll: true,
    });
};

const removeManager = ({ clubId, userId }: { clubId: number; userId: number }) => {
    router.delete(route('club.admin.club.managers.delete', { clubId, userId }), {
        onSuccess: () => {
            executeFetch();
            toast.success('Manager removed successfully');
        },
        onError: (error) => {
            toast.error('Error removing manager');
            console.error(error);
        },
        preserveScroll: true,
    });
};
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
                <hr />
            </SheetHeader>
            <div class="mt-12">
                <div v-if="isFetching">Loading...</div>
                <div v-else-if="error">Error: {{ error.message }}</div>
                <div v-else class="flex flex-col gap-8">
                    <div class="flex flex-col gap-4">
                        <H3>Coaches</H3>
                        <ScrollArea class="w-full" type="hover" v-if="data.club?.coaches.length">
                            <div class="mb-4 flex flex-row gap-4">
                                <AppUserCard
                                    v-for="coach in data.club?.coaches"
                                    :key="coach.id"
                                    :userId="coach.id"
                                    :name="coach.name"
                                    :email="coach.email"
                                >
                                    <template #content>
                                        <Button variant="destructive" class="w-full" @click="removeCoach({ clubId: props.clubId, userId: coach.id })">
                                            <X class="mr-2 h-4 w-4" />
                                            Remove from coaching staff
                                        </Button>
                                    </template>
                                </AppUserCard>
                            </div>
                            <ScrollBar orientation="horizontal" />
                        </ScrollArea>
                        <Muted v-else> No coaches found </Muted>
                        <AddCoach :club-id="props.clubId" @add-coach="executeFetch()" />
                    </div>
                    <div class="flex flex-col gap-4">
                        <H3>Leagues</H3>
                        <!-- TODO: Implement leagues section functionality -->
                        <!-- {{ data.club?.leagues }} -->
                        Incoming...
                    </div>
                    <div class="flex flex-col gap-4">
                        <H3>Managers</H3>
                        <ScrollArea class="w-full" type="hover" v-if="data.club?.managers.length">
                            <div class="mb-4 flex flex-row gap-4">
                                <AppUserCard
                                    v-for="manager in data.club?.managers"
                                    :key="manager.id"
                                    :userId="manager.id"
                                    :name="manager.name"
                                    :email="manager.email"
                                >
                                    <template #content>
                                        <Button
                                            variant="destructive"
                                            class="w-full"
                                            @click="removeManager({ clubId: props.clubId, userId: manager.id })"
                                        >
                                            <X class="mr-2 h-4 w-4" />
                                            Remove from management
                                        </Button>
                                    </template>
                                </AppUserCard>
                            </div>
                            <ScrollBar orientation="horizontal" />
                        </ScrollArea>
                        <Muted v-else> No managers found </Muted>
                        <AddManager :club-id="props.clubId" @add-manager="executeFetch()" />
                    </div>
                </div>
            </div>
        </SheetContent>
    </Sheet>
</template>
