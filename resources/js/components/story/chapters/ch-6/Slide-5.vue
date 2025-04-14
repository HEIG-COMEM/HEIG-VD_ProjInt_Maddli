<script setup lang="ts">
import { storyUtils } from '@/stores/storyUtils';
import { computed } from 'vue';
import AnswerFeedback from '../../feedback/AnswerFeedback.vue';

const bg = '/assets/story/bg/6-1.png';

const previousQuestionId = 64;

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
        title: isCorrect ? 'Perfect! You got it right.' : 'Almost there, but not quite the right choice.',
        text: isCorrect
            ? "By listening and offering advice from your experience, you show you're more than just a coach. Your empathy builds trust, proving you truly care about your player\’s well-being."
            : 'Ignoring the situation can make the player feel unsupported. Showing empathy and offering guidance helps build trust and strengthens your relationship with the team.',
    };
});
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="h-full">
        <AnswerFeedback :isCorrect="feedback.isCorrect" :feedbackTitle="feedback.title" :feedbackText="feedback.text" />
    </section>
</template>
