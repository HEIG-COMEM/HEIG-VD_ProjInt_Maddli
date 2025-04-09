<script setup lang="ts">
import QuestionMultipleChoice from '@/components/story/questions/QuestionMultipleChoice.vue';

const bg = '/assets/story/bg/3-3.png';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="h-full">
        <QuestionMultipleChoice
            :question-id="35"
            question="How do you handle a player's injury during a match?"
            :answers="[
                { id: 1, q: 'I ignore the injury and tell the team to keep playing.' },
                { id: 2, q: 'I take her off right away, and she’s done for the rest of the match.' },
                { id: 3, q: 'I check on her and ask if she can still play.' },
            ]"
            :correctAnswer="1"
        />
    </section>
</template>
