<script setup lang="ts">
import { storyUtils } from '@/stores/storyUtils';
import { ref } from 'vue';

const props = defineProps<{
    questionId: number;
    question: string;
    answers: { id: number; q: string }[];
    correctAnswer: number;
}>();
const storedChoices = storyUtils.getChoicesByQuestionId(props.questionId);
const selectedAnswer = ref<{ id: number; q: string } | null>(
    storedChoices.length > 0 ? (props.answers.find((answer) => answer.id === storedChoices[0].answerId) ?? null) : null,
);
const isButtonDisabled = ref(storedChoices.length > 0);

function handleChoice(answer: { id: number; q: string }) {
    // Allow changing the answer until validation
    if (!isButtonDisabled.value) {
        selectedAnswer.value = answer;
    }
}

function validateChoice() {
    if (selectedAnswer.value) {
        isButtonDisabled.value = true;
        storyUtils.addChoice({
            questionId: props.questionId,
            answerId: selectedAnswer.value.id,
            isCorrect: selectedAnswer.value.id === props.correctAnswer,
        });
        storyUtils.nextSlide();
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
                            'cursor-pointer hover:border-[#006565] hover:bg-[#00656533]': !isButtonDisabled || selectedAnswer?.id === answer.id,
                            'border-2 !border-[#006565] !bg-[#00656533]': selectedAnswer?.id === answer.id,
                            'cursor-not-allowed opacity-50': isButtonDisabled && selectedAnswer?.id !== answer.id,
                        },
                    ]"
                    :style="{ color: selectedAnswer === answer ? 'black' : '' }"
                    :disabled="isButtonDisabled"
                >
                    {{ answer.q }}
                </button>
            </div>

            <!-- Validate Button -->
            <button
                @click="validateChoice"
                :disabled="!selectedAnswer || isButtonDisabled"
                :class="[
                    'mt-4 rounded-lg border-2 border-[#006565] bg-[#006565] px-2 py-1 text-center font-medium text-white transition-all duration-200',
                    'text-xs lg:px-3 lg:text-lg xl:text-xl',
                    {
                        'cursor-not-allowed opacity-50': !selectedAnswer || isButtonDisabled,
                        'hover:border-[#005959] hover:bg-[#005959]': selectedAnswer && !isButtonDisabled,
                    },
                ]"
            >
                Validate
            </button>
        </div>
    </div>
</template>

<style scoped></style>
