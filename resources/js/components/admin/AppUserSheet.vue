<script setup lang="ts">
import AppUserCard from '@/components/admin/AppUserCard.vue';
import { Sheet, SheetContent, SheetDescription, SheetHeader, SheetTitle, SheetTrigger } from '@/components/ui/sheet';
import { formatRoles } from '@/composables/useFormat';
import { useFetch } from '@vueuse/core';

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
                                    <div class="flex flex-row items-center justify-start gap-2">
                                        <span class="text-sm font-bold">Role(s):</span>
                                        <span class="text-sm">{{ formatRoles(data.roles) }}</span>
                                    </div>
                                    <div class="flex flex-row items-center justify-start gap-2">
                                        <span class="text-sm font-bold">Coaching licence:</span>
                                        <span class="text-sm">{{ data.licence.name ?? 'none' }}</span>
                                    </div>
                                </div>
                            </template>
                        </AppUserCard>
                    </div>
                </div>
            </SheetHeader>
        </SheetContent>
    </Sheet>
</template>

<style scoped></style>
