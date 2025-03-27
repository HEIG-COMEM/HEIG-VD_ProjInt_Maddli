<script setup lang="ts">
import { Avatar, AvatarFallback } from '@/components/ui/avatar';
import { Tooltip, TooltipContent, TooltipProvider, TooltipTrigger } from '@/components/ui/tooltip';
import { getInitials } from '@/composables/useInitials';
import { defineProps } from 'vue';

defineProps<{
    userId: number;
    userName: string;
}>();

defineEmits(['click']);
</script>

<template>
    <TooltipProvider>
        <Tooltip>
            <TooltipTrigger @click="$emit('click', { userName, userId })">
                <Avatar class="size-8 overflow-hidden rounded-full">
                    <AvatarFallback class="rounded-lg bg-neutral-200 font-semibold text-black dark:bg-neutral-700 dark:text-white">
                        {{ getInitials(userName) }}
                    </AvatarFallback>
                </Avatar>
            </TooltipTrigger>
            <TooltipContent>
                <p>{{ userName }}</p>
            </TooltipContent>
        </Tooltip>
    </TooltipProvider>
</template>

<style scoped></style>
