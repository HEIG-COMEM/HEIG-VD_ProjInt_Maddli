<script setup lang="ts">
import QuestionMultipleChoice from '@/components/story/questions/QuestionMultipleChoice.vue';

const bg = '/assets/story/bg/4-4.png';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="h-full">
        <QuestionMultipleChoice
            :question-id="45"
            question="What do you say to your team at halftime to prepare them for the second half?"
            :answers="[
                { id: 1, q: 'I give clear and encouraging instructions to approach the second half with confidence.' },
                { id: 2, q: 'I ask the players to reflect on what\'s not working and suggest their own solutions.' },
                { id: 3, q: 'I shout at them to wake them up and light a fire under them.' },
            ]"
            :correctAnswer="1"
        />
    </section>
</template>
