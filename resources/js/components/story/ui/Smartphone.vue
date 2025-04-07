<script setup lang="ts">
import { useWindowSize } from '@vueuse/core';
import { computed } from 'vue';

// Define component props with default values
const props = withDefaults(
    defineProps<{
        variant: 1 | 2; // Phone variant (1 or 2) corresponding to phone-1.svg and phone-2.svg
        scale?: number; // Scale factor for the phone size
    }>(),
    {
        variant: 1,
        scale: 1,
    },
);

const { width, height } = useWindowSize();

// Compute the adjusted scale based on screen size
const adjustedScale = computed(() => {
    const isLandscape = width.value > height.value;
    if (width.value <= 640) {
        console.log('Mobile');
        return props.scale;
    } else if (width.value <= 1024 && isLandscape) {
        console.log('Landscape Phone/Tablet');
        return props.scale * 2;
    } else if (width.value <= 1024) {
        console.log('Tablet');
        return props.scale * 3;
    } else if (width.value <= 1280) {
        console.log('Small Desktop');
        return props.scale * 4.5;
    } else {
        console.log('Large Desktop');
        return props.scale * 6;
    }
});

// Compute the phone image source
const phoneImage = computed(() => `/assets/story/ch-1/elements/phone-${props.variant}.svg`);
</script>

<template>
    <img
        :src="phoneImage"
        :alt="`Phone variant ${variant}`"
        :style="{ transform: `scale(${adjustedScale})` }"
        class="absolute h-auto w-full max-w-[300px] object-contain md:max-w-[400px] lg:max-w-[500px]"
    />
</template>

<style scoped></style>
