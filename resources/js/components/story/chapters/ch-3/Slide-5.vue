<script setup lang="ts">
import QuestionMultipleChoice from '@/components/story/questions/QuestionMultipleChoice.vue';

const bg = '/assets/story/bg/3-3.png';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="h-full">
        <QuestionMultipleChoice
            question="How do you handle a player's injury during a match?"
            :answers="[
                'I ignore the injury and tell the team to keep playing.',
                'I take her off right away, and she’s done for the rest of the match.',
                'I check on her and ask if she can still play.',
            ]"
        />
    </section>
</template>
