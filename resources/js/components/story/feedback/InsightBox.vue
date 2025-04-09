<script setup lang="ts">
const props = defineProps<{
    title: string;
}>();
</script>

<template>
    <div class="mx-3 flex flex-col gap-1 font-baloo md:mx-8 md:gap-4 lg:gap-4 xl:mx-24 xl:mt-16 xl:gap-6">
        <!-- Insight label -->
        <p class="text-left text-sm text-white md:text-base lg:text-lg xl:text-2xl 2xl:text-2xl">Insight</p>

        <!-- Title -->
        <h2 class="text-left text-2xl font-bold text-[#FFA500] md:text-3xl lg:text-5xl xl:text-7xl">{{ props.title }}</h2>

        <!-- Slot for main content -->
        <div class="max-w-full space-y-2 text-left text-sm text-white md:text-lg lg:space-y-4 lg:text-xl xl:text-3xl">
            <slot></slot>
        </div>
    </div>
</template>

<style scoped></style>
