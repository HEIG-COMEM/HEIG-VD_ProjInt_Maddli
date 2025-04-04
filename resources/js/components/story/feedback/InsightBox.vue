<script setup lang="ts">
const props = defineProps<{
    title: string;
}>();
</script>

<template>
    <div class="ml-16 mt-8 flex flex-col gap-6 font-baloo xl:ml-32 xl:mt-16">
        <!-- Insight label -->
        <p class="text-left text-xl text-white">Insight</p>

        <!-- Title -->
        <h2 class="text-left text-6xl font-bold text-[#FFA500]">{{ props.title }}</h2>

        <!-- Slot for main content -->
        <div class="max-w-prose space-y-4 text-left text-xl text-white">
            <slot></slot>
        </div>
    </div>
</template>

<style scoped></style>
