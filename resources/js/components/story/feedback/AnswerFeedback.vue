<script setup lang="ts">
import { Check, X } from 'lucide-vue-next';

defineProps<{
    isCorrect: boolean | null;
    feedbackTitle: string;
    feedbackText: string;
}>();
</script>

<template>
    <!-- Background Overlay -->
    <div class="absolute inset-0 -z-10 h-full w-full scale-150 bg-black opacity-50"></div>

    <!-- Main Container -->
    <div class="m-2 flex h-full flex-col items-center justify-center gap-2 p-8 md:gap-3 lg:gap-4 xl:gap-5 xl:p-10">
        <!-- Feedback Box -->
        <div
            v-if="isCorrect !== null"
            class="relative w-full max-w-xl rounded-xl border-2 border-gray-200 bg-white p-4 text-center shadow-lg md:max-w-2xl md:rounded-2xl md:p-6 lg:max-w-3xl lg:rounded-3xl lg:p-8 xl:max-w-4xl xl:p-10"
        >
            <!-- Icon Container -->
            <div
                :class="['absolute rounded-full p-2 md:p-2.5 lg:p-3 xl:p-3.5', isCorrect ? 'bg-green-100' : 'bg-red-100']"
                class="xl:h-18 xl:w-18 -left-6 -top-6 h-12 w-12 md:-left-7 md:-top-7 md:h-14 md:w-14 lg:-left-8 lg:-top-8 lg:h-16 lg:w-16 xl:-left-9 xl:-top-9"
            >
                <!-- Icon -->
                <div :class="['flex h-full w-full items-center justify-center rounded-full', isCorrect ? 'bg-green-500' : 'bg-red-500']">
                    <component :is="isCorrect ? Check : X" class="h-4 w-4 text-white md:h-5 md:w-5 lg:h-6 lg:w-6 xl:h-7 xl:w-7" />
                </div>
            </div>

            <!-- Feedback Content -->
            <h2 class="mb-2 text-lg font-bold text-black md:mb-3 md:text-xl lg:mb-4 lg:text-2xl xl:mb-5 xl:text-3xl">{{ feedbackTitle }}</h2>
            <p class="text-sm text-black md:text-base lg:text-lg xl:text-xl">{{ feedbackText }}</p>
        </div>

        <!-- No Feedback Box -->
        <div
            v-else
            class="relative w-full max-w-xl rounded-xl border-2 border-gray-200 bg-white p-4 text-center shadow-lg md:max-w-2xl md:rounded-2xl md:p-6 lg:max-w-3xl lg:rounded-3xl lg:p-8 xl:max-w-4xl xl:p-10"
        >
            <p class="text-sm text-gray-800 md:text-base lg:text-lg xl:text-2xl">If you want a feedback, answer the previous question!</p>
        </div>
    </div>
</template>

<style scoped></style>
