<script setup lang="ts">
import { useWindowSize } from '@vueuse/core';
import { computed, defineProps } from 'vue';

const props = defineProps({
    chNumber: {
        type: Number,
        required: true,
    },
    poseNumber: {
        type: Number,
        required: true,
    },
    scale: {
        type: Number,
        default: 1,
    },
});

//TODO: Remove console.log statements in production
const { width, height } = useWindowSize();
const adjustedScale = computed(() => {
    const isLandscape = width.value > height.value;
    if (width.value <= 640) {
        console.log('Mobile');
        return props.scale;
    } else if (width.value <= 1024 && isLandscape) {
        console.log('Landscape Phone/Tablet');
        return props.scale * 2.5;
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
</script>

<template>
    <img
        :src="`/assets/story/ch-${props.chNumber}/parents/${props.poseNumber}.svg`"
        alt="A Parent"
        class="absolute bottom-0 left-0 object-contain"
        :style="{ zIndex: 1000, transform: `scale(${adjustedScale}) translateX(-50%)` }"
    />
</template>

<style scoped></style>
