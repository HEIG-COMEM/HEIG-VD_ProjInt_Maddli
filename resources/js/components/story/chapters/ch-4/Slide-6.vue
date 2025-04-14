<script setup lang="ts">
import { storyUtils } from '@/stores/storyUtils';
import { computed } from 'vue';
import AnswerFeedback from '../../feedback/AnswerFeedback.vue';

const bg = '/assets/story/bg/4-4.png';

const previousQuestionId = 45;

const feedback = computed(() => {
    const previousChoices = storyUtils.choices.find((choice) => choice.questionId === previousQuestionId);
    if (!previousChoices) {
        return {
            isCorrect: null,
            title: '',
            text: '',
        };
    }

    // Get the selected answer ID
    const selectedAnswerId = previousChoices.answerId;

    // Define feedback for each answer
    const feedbackMap = {
        1: {
            isCorrect: true,
            title: 'Fantastic! You made a great decision.',
            text: 'However, focusing too much on positivity might overlook deeper issues that need to be addressed directly.',
        },
        2: {
            isCorrect: true,
            title: 'It could work, but...',
            text: 'If the team lacks experience or is feeling low, this could lead to more confusion than clarity.',
        },
        3: {
            isCorrect: true,
            title: 'It could work, but...',
            text: 'If overused or poorly timed, this can damage trust and reduce motivation.',
        },
    };

    return (
        feedbackMap[selectedAnswerId as keyof typeof feedbackMap] || {
            isCorrect: null,
            title: '',
            text: '',
        }
    );
});
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="h-full">
        <AnswerFeedback :isCorrect="feedback.isCorrect" :feedbackTitle="feedback.title" :feedbackText="feedback.text" />
    </section>
</template>
