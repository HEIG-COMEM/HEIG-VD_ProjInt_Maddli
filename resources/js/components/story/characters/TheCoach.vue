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

const { width } = useWindowSize();
const adjustedScale = computed(() => (width.value <= 1280 ? props.scale / 2 : props.scale));
</script>

<template>
    <img
        :src="`/assets/story/ch-${props.chNumber}/coach/${props.poseNumber}.svg`"
        alt="The Coach"
        class="absolute bottom-0 left-0 object-contain"
        :style="{ zIndex: 1000, transform: `scale(${adjustedScale}) translateX(-50%)` }"
    />
</template>

<style scoped></style>
