<script setup lang="ts">
import { P } from '@/components/typography/texts';

defineProps<{
    title: string;
    description: string;
    number: number;
}>();
</script>

<template>
    <div class="flex aspect-video w-full flex-col justify-between gap-4 rounded-lg bg-secondary/30 p-6 text-left text-secondary-foreground shadow-lg">
        <div class="flex flex-col">
            <P class="text-4xl font-bold text-accent">{{ number }}</P>
            <P class="text-xl font-bold">{{ title }}</P>
        </div>
        <P class="!mt-0 text-lg">{{ description }}</P>
    </div>
</template>

<style scoped></style>
