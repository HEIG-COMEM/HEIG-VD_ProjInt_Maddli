<script setup lang="ts">
const props = defineProps<{
    text: string;
    position: 'left' | 'right';
}>();
</script>

<template>
    <!-- TODO : Bubble should be positioned wherever we need, and fix the tail black line to be white where the tail meet the bubble -->
    <div class="m-8">
        <div class="relative mr-4 inline-block rounded-3xl border-2 border-black bg-white p-6">
            <!-- Text content with comfortable reading space -->
            <p class="text-xs leading-relaxed text-black">
                {{ props.text }}
            </p>

            <!-- Tail/pointer of the bubble -->
            <div :class="`absolute -bottom-7 ${props.position === 'left' ? 'left-3' : 'right-3'} z-10`">
                <!-- Left side of the bubble -->
                <svg v-if="props.position === 'left'" xmlns="http://www.w3.org/2000/svg" width="50" height="28" viewBox="0 0 253 136" fill="none">
                    <path
                        d="M50.8986 1H58.3986C64.2986 1 69.7657 4.13273 72.7657 9.23273C75.7657 14.3327 75.833 20.6328 72.933 25.8C46.4658 73.1656 9.36568 123.266 2.93286 131.833C2.36724 132.733 1.73281 133.6 1 134.4C2.03281 133.833 2.9 133.2 4 132.9C32.0672 125 177.867 76.8672 254.167 1H255.167"
                        stroke="black"
                        stroke-width="10"
                    />
                </svg>
                <!-- Right side of the bubble -->
                <svg v-if="props.position === 'right'" xmlns="http://www.w3.org/2000/svg" width="50" height="28" viewBox="0 0 253 136" fill="none">
                    <path
                        d="M204.269 1H196.769C190.869 1 185.401 4.13273 182.401 9.23273C179.401 14.3327 179.334 20.6328 182.234 25.8C208.701 73.1656 245.802 123.266 252.234 131.833C252.8 132.733 253.434 133.6 254.167 134.4C253.134 133.833 252.267 133.2 251.167 132.9C223.1 125 77.3 76.8672 1 1H0"
                        stroke="black"
                        stroke-width="10"
                    />
                </svg>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
