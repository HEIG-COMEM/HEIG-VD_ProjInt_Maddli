<script setup lang="ts">
import { storyUtils } from '@/stores/storyUtils';
import { computed } from 'vue';
import AnswerFeedback from '../../feedback/AnswerFeedback.vue';

const bg = '/assets/story/bg/2-4.png';

const previousQuestionId = 25;

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
        title: isCorrect ? "Great job! You've made the right choice." : "Not quite, but you're close!",
        text: isCorrect
            ? 'By refocusing the team while maintaining a positive atmosphere, you help them approach the match with the right mindset.'
            : 'Effective team management requires setting clear rules, maintaining attention, and knowing when to refocus the group. The warm-up is a key moment to establish concentration and mentally prepare the team before stepping onto the field.',
    };
});
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="h-full">
        <AnswerFeedback :isCorrect="feedback.isCorrect" :feedbackTitle="feedback.title" :feedbackText="feedback.text" />
    </section>
</template>
