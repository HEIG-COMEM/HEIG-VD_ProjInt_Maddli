<script setup lang="ts">
import { storyUtils } from '@/stores/storyUtils';
import { computed } from 'vue';
import AnswerFeedback from '../../feedback/AnswerFeedback.vue';

const bg = '/assets/story/bg/4-4.png';

const previousQuestionId = 45;

// TODO: Feedback should handle all 3 answers (there is no wrong answer)
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
        title: isCorrect ? 'Fantastic! You made a great decision.' : 'It could work, but...',
        text: isCorrect
            ? 'However, focusing too much on positivity might overlook deeper issues that need to be addressed directly.'
            : 'If the team lacks experience or is feeling low, this could lead to more confusion than clarity.',
    };
});
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="h-full">
        <AnswerFeedback :isCorrect="feedback.isCorrect" :feedbackTitle="feedback.title" :feedbackText="feedback.text" />
    </section>
</template>
