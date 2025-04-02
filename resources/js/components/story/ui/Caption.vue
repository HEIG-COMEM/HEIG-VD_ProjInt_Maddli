<script setup lang="ts">
import { computed } from 'vue';

// Define component props with default values
const props = withDefaults(
    defineProps<{
        position?: {
            top: number; // Top position of the caption
            left: number; // Left position of the caption
            unit: 'px' | '%' | 'viewport'; // Unit for positioning (pixels, percentage, or viewport)
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

// Compute the CSS style for positioning the caption
const unit = computed(() => {
    if (props.position.unit === 'viewport') {
        // Convert viewport units to vh and vw
        return {
            top: `${props.position.top}vh`,
            left: `${props.position.left}vw`,
        };
    }
    // Use the specified unit for positioning
    return {
        top: `${props.position.top}${props.position.unit}`,
        left: `${props.position.left}${props.position.unit}`,
    };
});
</script>

<template>
    <!-- Main container for the caption, positioned absolutely -->
    <div class="absolute" :style="unit">
        <!-- Text content with styling for the caption -->
        <div class="font-comic"><slot /></div>
    </div>
</template>

<style scoped></style>
