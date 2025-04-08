<script setup lang="ts">
import { P } from '@/components/typography/texts';
import { LucideIcon } from 'lucide-vue-next';

defineProps<{
    title: string;
    description: string;
    icon: LucideIcon;
}>();
</script>

<template>
    <div class="flex w-full flex-col justify-between gap-4 rounded-lg bg-secondary/30 p-6 text-left text-secondary-foreground shadow-lg">
        <div class="flex flex-col">
            <component :is="icon" class="h-8 w-8 text-accent" />
            <P class="text-xl font-bold">{{ title }}</P>
        </div>
        <P class="text-lg">{{ description }}</P>
    </div>
</template>

<style scoped></style>
