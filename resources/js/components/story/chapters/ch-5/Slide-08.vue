<script setup lang="ts">
import { storyUtils } from '@/stores/storyUtils';
import { computed } from 'vue';
import AnswerFeedback from '../../feedback/AnswerFeedback.vue';

const bg = '/assets/story/bg/5-5.png';

const previousQuestionId = 57;

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
        isCorrect,
        title: isCorrect ? 'Well done! That was the correct choice.' : "Not quite, but you're close!",
        text: isCorrect
            ? 'Great choice! By staying calm and clearly explaining your decisions, you reassured the parent while reinforcing the team’s values of effort and collective success.'
            : 'A clear and calm explanation could have reassured the parent and reinforced team values, preventing unnecessary conflict.',
    };
});
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="h-full">
        <AnswerFeedback :isCorrect="feedback.isCorrect" :feedbackTitle="feedback.title" :feedbackText="feedback.text" />
    </section>
</template>
