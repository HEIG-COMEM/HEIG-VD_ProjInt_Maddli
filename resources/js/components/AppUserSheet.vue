<script setup lang="ts">
import { Sheet, SheetContent, SheetDescription, SheetHeader, SheetTitle, SheetTrigger } from '@/components/ui/sheet';
import { useFetch } from '@vueuse/core';
import TheLoading from './TheLoading.vue';

const props = defineProps<{
    userId: number;
}>();

const { isFetching, error, data } = useFetch(`/club/admin/users/${props.userId}?json`, { refetch: true });
</script>

<template>
    <Sheet>
        <SheetTrigger>
            <slot />
        </SheetTrigger>
        <SheetContent>
            <SheetHeader>
                <SheetTitle>User infos</SheetTitle>
                <SheetDescription>
                    <div v-if="isFetching">
                        <TheLoading />
                    </div>
                    <div v-else-if="error">Error: {{ error.message }}</div>
                    <div v-else>{{ data }}</div>
                </SheetDescription>
            </SheetHeader>
        </SheetContent>
    </Sheet>
</template>
