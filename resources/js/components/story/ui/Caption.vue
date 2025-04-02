<script setup lang="ts">
import { computed } from 'vue';

// Define component props with default values
const props = withDefaults(
    defineProps<{
        position?: {
            top: number; // Caption's top position
            left: number; // Caption's left position
            unit: 'px' | '%' | 'viewport'; // Positioning unit: pixels, percentage, or viewport
        };
    }>(),
    {
        position: () => ({
            top: 0, // Default top position
            left: 0, // Default left position
            unit: 'viewport', // Default unit is 'viewport'
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
        <div class="font-comic max-w-[400px] break-words rounded bg-[#feffd3] p-4 px-6 text-left text-xl leading-relaxed text-[#321c16] shadow-md">
            <slot />
        </div>
    </div>
</template>
