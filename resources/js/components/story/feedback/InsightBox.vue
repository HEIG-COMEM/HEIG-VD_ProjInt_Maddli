<script setup lang="ts">
const props = defineProps<{
    title: string;
}>();
</script>

<template>
    <div class="p-6">
        <!-- Insight label -->
        <p class="mb-2 text-left text-sm text-white">Insight</p>

        <!-- Title -->
        <h2 class="mb-4 text-left text-3xl font-bold text-[#FFA500]">{{ props.title }}</h2>

        <!-- Slot for main content -->
        <div class="max-w-prose space-y-4 text-left text-white">
            <slot></slot>
        </div>
    </div>
</template>

<style scoped></style>
