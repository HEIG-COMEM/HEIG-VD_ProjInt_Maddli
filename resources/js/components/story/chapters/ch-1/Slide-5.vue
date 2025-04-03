<script setup lang="ts">
import AnswerFeedback from '@/components/story/feedback/AnswerFeedback.vue';
</script>

<template>
    <section>
        <h1>Chapter 1 - Slide 5</h1>
        <AnswerFeedback
            :isCorrect="true"
            feedbackTitle="Great job! You've made the right choice."
            feedbackText="Well done! That was the correct choice. By refocusing the team while maintaining a positive atmosphere, you help them approach the match with the right mindset."
        />
        <AnswerFeedback
            :isCorrect="false"
            feedbackTitle="Oops! You made the wrong choice."
            feedbackText="That was not the correct choice. By focusing too much on the score, you risk creating tension and stress within the team. Instead, try to refocus on the process and the team's performance."
        />
    </section>
</template>
