<script setup lang="ts">
import { computed } from 'vue';

// Define component props with default values
const props = withDefaults(
    defineProps<{
        position?: {
            top: number;
            left: number;
            unit: 'px' | '%' | 'viewport';
        };
    }>(),
    {
        // Default values
        position: () => ({
            top: 0,
            left: 0,
            unit: 'viewport',
        }),
    },
);

// Compute CSS style for caption positioning
const unit = computed(() => {
    if (props.position.unit === 'viewport') {
        // Convert viewport units to vh and vw
        return {
            top: `${props.position.top}vh`,
            left: `${props.position.left}vw`,
        };
    }
    // Use specified unit for positioning
    return {
        top: `${props.position.top}${props.position.unit}`,
        left: `${props.position.left}${props.position.unit}`,
    };
});
</script>

<template>
    <!-- Caption container with absolute positioning -->
    <div class="absolute" :style="unit">
        <!-- Caption styled as a sticky note -->
        <div
            class="max-w-[16rem] break-words rounded bg-[#feffd3] p-2 px-4 text-left font-comic text-base font-bold leading-relaxed text-black shadow-md md:!max-w-sm md:p-4 md:px-6 md:text-xl xl:text-2xl"
        >
            <slot />
        </div>
    </div>
</template>
