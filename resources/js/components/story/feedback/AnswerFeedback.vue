<script setup lang="ts">
import { Check, X } from 'lucide-vue-next';

defineProps<{
    isCorrect: boolean;
    feedbackTitle: string;
    feedbackText: string;
}>();
</script>

<template>
    <div class="flex flex-col items-center justify-center gap-4 p-4">
        <div class="relative w-full max-w-3xl rounded-3xl border-2 border-gray-200 bg-white p-8 text-center shadow-lg">
            <div :class="['absolute -left-8 -top-8 h-16 w-16 rounded-full p-3', isCorrect ? 'bg-green-100' : 'bg-red-100']">
                <div :class="['flex h-full w-full items-center justify-center rounded-full', isCorrect ? 'bg-green-500' : 'bg-red-500']">
                    <component :is="isCorrect ? Check : X" class="h-6 w-6 text-white" />
                </div>
            </div>

            <!-- Feedback Content -->
            <h2 class="mb-4 text-2xl font-bold text-black">{{ feedbackTitle }}</h2>
            <p class="text-lg text-gray-600">{{ feedbackText }}</p>
        </div>
    </div>
</template>

<style scoped></style>
