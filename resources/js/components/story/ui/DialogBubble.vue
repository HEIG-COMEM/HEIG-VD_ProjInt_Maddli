<script setup lang="ts">
import { computed } from 'vue';

const props = withDefaults(
    defineProps<{
        text: string;
        tailPosition?: 'left' | 'right';
        position?: {
            top: number;
            left: number;
            unit: 'px' | '%' | 'viewport';
        };
    }>(),
    {
        tailPosition: 'left',
        position: () => ({
            top: 0,
            left: 0,
            unit: 'viewport',
        }),
    },
);

const unit = computed(() => {
    if (props.position.unit === 'viewport') {
        return {
            top: `${props.position.top}vh`,
            left: `${props.position.left}vw`,
        };
    }
    return {
        top: `${props.position.top}${props.position.unit}`,
        left: `${props.position.left}${props.position.unit}`,
    };
});
</script>

<template>
    <div class="absolute m-8" :style="unit">
        <div class="relative mr-4 inline-block max-w-md rounded-3xl border-2 border-black bg-white p-6">
            <!-- Text content with comfortable reading space -->
            <p class="text-pretty break-words text-left text-lg leading-relaxed text-black">{{ props.text }}</p>

            <!-- Tail/pointer of the bubble -->
            <div :class="`absolute -bottom-7 ${props.tailPosition === 'left' ? 'left-3' : 'right-3'} z-10`">
                <svg
                    width="50"
                    height="28"
                    viewBox="0 0 255 134"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    :style="`transform: scaleX(${props.tailPosition === 'right' ? '-1' : '1'})`"
                >
                    <path
                        d="M2.86643 131.418C2.53645 131.508 2.22258 131.628 1.92053 131.765C2.06649 131.551 2.20788 131.334 2.34509 131.117C8.8149 122.499 45.9018 72.4104 72.3695 25.0439C75.3561 19.7216 75.2867 13.2322 72.1967 7.97922C70.121 4.45052 66.8982 1.83596 63.1634 0.5H251.951C213.893 37.9818 158.895 68.6557 109.789 90.9825C60.3207 113.474 16.8797 127.474 2.86643 131.418Z"
                        fill="white"
                        stroke="black"
                        stroke-width="10"
                    />
                    <path d="M75.5 0 H240.5" stroke="white" stroke-width="12" style="border-radius: 1000px" />
                </svg>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
