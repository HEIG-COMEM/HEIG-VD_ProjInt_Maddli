<script setup lang="ts">
import { storyStore } from '@/stores/storyStore';
import { ref } from 'vue';

const selectedAnswer = ref<string | null>(null);

function handleChoice(answer: string) {
    if (selectedAnswer.value === null) {
        selectedAnswer.value = answer;
        storyStore.addChoice(answer);
    }
}
</script>

<template>
    <section>
        <h1>Chapter 1 - Slide 2</h1>
        <div class="flex flex-col justify-center gap-2 p-4">
            <!-- Question Box -->
            <div class="mb-4 rounded border-2 border-gray-300 bg-gray-100 p-4">
                <p class="text-lg font-bold">What is your choice?</p>
            </div>
            <!-- Choices -->
            <label
                :class="{ locked: storyStore.choices.includes('Answer 1'), 'bg-blue-500 text-white': selectedAnswer === 'Answer 1' }"
                class="cursor-pointer rounded border-2 border-blue-500 px-4 py-2 font-bold text-blue-500"
                :style="{ pointerEvents: selectedAnswer ? 'none' : 'auto' }"
            >
                <input type="radio" name="answers" value="Answer 1" @change="handleChoice('Answer 1')" class="hidden" />
                Answer 1
            </label>
            <label
                :class="{ locked: storyStore.choices.includes('Answer 2'), 'bg-blue-500 text-white': selectedAnswer === 'Answer 2' }"
                class="cursor-pointer rounded border-2 border-blue-500 px-4 py-2 font-bold text-blue-500"
                :style="{ pointerEvents: selectedAnswer ? 'none' : 'auto' }"
            >
                <input type="radio" name="answers" value="Answer 2" @change="handleChoice('Answer 2')" class="hidden" />
                Answer 2
            </label>
            <label
                :class="{ locked: storyStore.choices.includes('Answer 3'), 'bg-blue-500 text-white': selectedAnswer === 'Answer 3' }"
                class="cursor-pointer rounded border-2 border-blue-500 px-4 py-2 font-bold text-blue-500"
                :style="{ pointerEvents: selectedAnswer ? 'none' : 'auto' }"
            >
                <input type="radio" name="answers" value="Answer 3" @change="handleChoice('Answer 3')" class="hidden" />
                Answer 3
            </label>
            <label
                :class="{ locked: storyStore.choices.includes('Answer 4'), 'bg-blue-500 text-white': selectedAnswer === 'Answer 4' }"
                class="cursor-pointer rounded border-2 border-blue-500 px-4 py-2 font-bold text-blue-500"
                :style="{ pointerEvents: selectedAnswer ? 'none' : 'auto' }"
            >
                <input type="radio" name="answers" value="Answer 4" @change="handleChoice('Answer 4')" class="hidden" />
                Answer 4
            </label>
        </div>
    </section>
</template>
