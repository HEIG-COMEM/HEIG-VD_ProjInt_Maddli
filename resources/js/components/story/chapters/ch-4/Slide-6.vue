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
        title: isCorrect ? 'Awesome! That was the right call.' : 'Almost there, but not quite the right choice.',
        text: isCorrect
            ? 'Well done! By reacting quickly and taking care of your players, you kept the team stable and focused, ready to face any challenge.'
            : "Ignoring the injury disrupted the team's balance. Taking care of your players would have ensured stability and kept everyone focused.",
    };
});
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="h-full">
        <AnswerFeedback :isCorrect="feedback.isCorrect" :feedbackTitle="feedback.title" :feedbackText="feedback.text" />
    </section>
</template>
