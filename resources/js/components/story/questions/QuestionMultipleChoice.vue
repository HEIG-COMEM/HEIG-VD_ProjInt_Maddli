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
    <div class="flex flex-col items-center justify-center gap-4 p-4">
        <!-- Question Box -->
        <div class="w-full max-w-3xl rounded-3xl border-2 border-gray-200 bg-white p-8 text-center shadow-lg">
            <p class="mb-8 text-2xl font-bold text-black">{{ props.question }}</p>

            <!-- Answer Choices -->
            <div class="flex flex-col gap-4">
                <button
                    v-for="(answer, index) in props.answers"
                    :key="index"
                    @click="handleChoice(answer)"
                    :class="[
                        'w-full rounded-2xl border-2 border-gray-200 bg-white p-4 text-center text-lg font-medium transition-all duration-200',
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
