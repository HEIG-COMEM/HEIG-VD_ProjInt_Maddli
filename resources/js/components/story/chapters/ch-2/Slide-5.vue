<script setup lang="ts">
import QuestionMultipleChoice from '@/components/story/questions/QuestionMultipleChoice.vue';

const bg = '/assets/story/bg/2-4.png';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="relative h-full">
        <QuestionMultipleChoice
            question="You see the players joking around before the warm-up. How do you get them to refocus?"
            :answers="[
                'I remind them of the importance of proper preparation to enter the game in the best conditions.',
                'I let them continue, hoping they will focus on their own by kickoff.',
                'I shout at them to stop immediately and line up.',
            ]"
        />
    </section>
</template>
