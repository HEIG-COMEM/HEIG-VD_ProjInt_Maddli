<script setup lang="ts">
import AppUserCard from '@/components/admin/AppUserCard.vue';
import { H3 } from '@/components/typography/headings';
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
                <div v-else>
                    <H3>Coaches</H3>
                    <ScrollArea class="w-full" type="hover">
                        <div class="mb-4 flex flex-row gap-4">
                            <AppUserCard
                                v-for="coach in data.club?.coaches"
                                :key="coach.id"
                                :userId="coach.id"
                                :name="coach.name"
                                :email="coach.email"
                            >
                                <template #content>
                                    <Button variant="destructive" class="w-full" @click="removeCoach({ clubId: clubId, userId: coach.id })">
                                        <X class="mr-2 h-4 w-4" />
                                        Remove from coaching staff
                                    </Button>
                                </template>
                            </AppUserCard>
                        </div>
                        <ScrollBar orientation="horizontal" />
                    </ScrollArea>
                    <br />
                    <H3>Leagues</H3>
                    {{ data.club?.leagues }}
                    <br />
                    <H3>Managers</H3>
                    {{ data.club?.managers }}
                </div>
            </div>
        </SheetContent>
    </Sheet>
</template>
