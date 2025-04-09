<script setup lang="ts">
import QuestionMultipleChoice from '@/components/story/questions/QuestionMultipleChoice.vue';

const bg = '/assets/story/bg/2-4.png';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="relative h-full">
        <QuestionMultipleChoice
            :question-id="25"
            question="You see the players joking around before the warm-up. How do you get them to refocus?"
            :answers="[
                { id: 1, q: 'I remind them of the importance of proper preparation to enter the game in the best conditions.' },
                { id: 2, q: 'I let them continue, hoping they will focus on their own by kickoff.' },
                { id: 3, q: 'I shout at them to stop immediately and line up.' },
            ]"
            :correctAnswer="1"
        />
    </section>
</template>
