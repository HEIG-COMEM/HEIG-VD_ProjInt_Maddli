<script setup lang="ts">
import { Sheet, SheetContent, SheetDescription, SheetHeader, SheetTitle, SheetTrigger } from '@/components/ui/sheet';
import { useFetch } from '@vueuse/core';
import TheLoading from './TheLoading.vue';

const props = withDefaults(
    defineProps<{
        userId: number;
        path?: string;
        title?: string;
    }>(),
    {
        path: '/club/admin/users',
        title: 'User infos',
    },
);

const { isFetching, error, data } = useFetch(`${props.path}/${props.userId}?json`, { refetch: true });
</script>

<template>
    <Sheet>
        <SheetTrigger>
            <slot />
        </SheetTrigger>
        <SheetContent>
            <SheetHeader>
                <SheetTitle>{{ title }}</SheetTitle>
                <SheetDescription>
                    <div v-if="isFetching">
                        <TheLoading />
                    </div>
                    <div v-else-if="error">Error: {{ error }}</div>
                    <div v-else>{{ data }}</div>
                </SheetDescription>
            </SheetHeader>
        </SheetContent>
    </Sheet>
</template>
