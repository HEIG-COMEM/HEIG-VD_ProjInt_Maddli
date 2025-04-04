<script setup lang="ts">
const props = defineProps<{
    title: string;
}>();
</script>

<template>
    <div class="ml-4 mt-4 flex flex-col gap-1 font-baloo lg:ml-8 lg:mt-8 lg:gap-4 xl:ml-24 xl:mt-16 xl:gap-6">
        <!-- Insight label -->
        <p class="text-left text-xs text-white md:text-sm lg:text-base xl:text-lg">Insight</p>

        <!-- Title -->
        <h2 class="text-left text-xl font-bold text-[#FFA500] md:text-2xl lg:text-4xl xl:text-6xl">{{ props.title }}</h2>

        <!-- Slot for main content -->
        <div class="max-w-prose space-y-2 text-left text-sm text-white md:text-base lg:space-y-4 lg:text-lg xl:text-xl">
            <slot></slot>
        </div>
    </div>
</template>

<style scoped></style>
