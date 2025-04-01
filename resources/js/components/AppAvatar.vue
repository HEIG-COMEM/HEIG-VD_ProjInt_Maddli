<script setup lang="ts">
import { Avatar, AvatarFallback } from '@/components/ui/avatar';
import { getInitials } from '@/composables/useInitials';

defineProps<{
    name: string;
    size?: 'normal' | 'small';
}>();
</script>

<template>
    <Avatar class="center size-16 overflow-hidden rounded-full">
        <AvatarFallback class="rounded-lg bg-neutral-200 font-semibold text-black dark:bg-neutral-700 dark:text-white">
            <p class="text-xl">{{ getInitials(name) }}</p>
        </AvatarFallback>
    </Avatar>
</template>

<style scoped></style>
