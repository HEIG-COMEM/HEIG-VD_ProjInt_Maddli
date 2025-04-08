<script setup lang="ts">
import { P } from '@/components/typography/texts';

defineProps<{
    title: string;
    number: number;
}>();
</script>

<template>
    <div class="flex w-full flex-col justify-between gap-4 rounded-lg bg-secondary/30 p-6 text-left text-secondary-foreground shadow-lg">
        <div class="flex flex-col">
            <P class="text-4xl font-bold text-accent">{{ number }}</P>
            <P class="text-xl font-bold">{{ title }}</P>
        </div>
        <slot name="description">
            <P class="!mt-0 text-lg">Default description</P>
        </slot>
    </div>
</template>

<style scoped></style>
