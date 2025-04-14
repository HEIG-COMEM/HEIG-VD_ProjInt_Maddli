<script setup lang="ts">
import { storyUtils } from '@/stores/storyUtils';
import { computed } from 'vue';
import AnswerFeedback from '../../feedback/AnswerFeedback.vue';

const bg = '/assets/story/bg/7-2.png';

const previousQuestionId = 74;

const feedback = computed(() => {
    const previousChoices = storyUtils.choices.find((choice) => choice.questionId === previousQuestionId);
    if (!previousChoices) {
        return {
            isCorrect: null,
            title: '',
            text: '',
        };
    }

    const isCorrect = previousChoices.isCorrect ?? false;
    return {
        isCorrect: !isCorrect,
        title: isCorrect ? 'Good try, but the best option was slightly different.' : "Excellent choice! You're on the right track.",
        text: isCorrect
            ? "Focusing only on the player's weaknesses could create frustration and weaken trust between you, the player, and their parents."
            : "By highlighting the player's progress and dedication, you reassured the parents and encouraged their continued support, helping the player stay motivated and engaged.",
    };
});
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="h-full">
        <AnswerFeedback :isCorrect="feedback.isCorrect" :feedbackTitle="feedback.title" :feedbackText="feedback.text" />
    </section>
</template>
