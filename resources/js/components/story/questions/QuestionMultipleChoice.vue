<script setup lang="ts">
import { storyStore } from '@/stores/storyStore';
import { ref } from 'vue';

const props = defineProps<{
    question: string;
    answers: string[];
}>();

const selectedAnswer = ref<string | null>(null);

function handleChoice(answer: string) {
    if (selectedAnswer.value === null) {
        selectedAnswer.value = answer;
        storyStore.addChoice(answer);
    }
}
</script>

<template>
    <div class="absolute inset-0 -z-10 h-full w-full scale-150 bg-black opacity-50"></div>
    <div class="flex h-full items-center justify-center">
        <!-- Question Box -->
        <div class="max-w-3xl rounded-xl border-2 border-gray-200 bg-white p-4 text-center shadow-lg md:rounded-2xl md:p-6 lg:rounded-3xl lg:p-8">
            <p class="mb-4 text-sm font-bold text-black md:text-lg lg:text-xl">{{ props.question }}</p>

            <!-- Answer Choices -->
            <div class="flex flex-col gap-2">
                <button
                    v-for="(answer, index) in props.answers"
                    :key="index"
                    @click="handleChoice(answer)"
                    :class="[
                        'w-full rounded-lg border-2 border-gray-200 bg-white p-2 text-center text-xs font-medium transition-all duration-200 md:rounded-xl md:p-3 md:text-sm lg:rounded-2xl lg:p-4 lg:text-lg',
                        {
                            'cursor-pointer hover:border-blue-300 hover:bg-blue-50': !selectedAnswer,
                            'border-blue-500 bg-blue-100 text-blue-700': selectedAnswer === answer,
                            'cursor-not-allowed opacity-50': selectedAnswer && selectedAnswer !== answer,
                        },
                    ]"
                    :disabled="selectedAnswer !== null"
                >
                    {{ answer }}
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
