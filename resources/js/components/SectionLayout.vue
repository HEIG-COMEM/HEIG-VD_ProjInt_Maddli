<script setup lang="ts">
import { computed, defineProps } from 'vue';

const props = defineProps({
    background: {
        type: String,
        default: 'bg-background',
    },
    textColor: {
        type: String,
        default: 'text-foreground',
    },
    padding: {
        type: String,
        default: 'px-8 py-16',
    },
    gap: {
        type: String,
        default: 'gap-16',
    },
});

const computedClasses = computed(() => `${props.background} ${props.textColor} ${props.padding} ${props.gap} flex w-screen flex-col items-center`);
</script>
<template>
    <div :class="computedClasses">
        <div class="flex w-full max-w-screen-lg flex-col items-center gap-6">
            <slot />
        </div>
    </div>
</template>
