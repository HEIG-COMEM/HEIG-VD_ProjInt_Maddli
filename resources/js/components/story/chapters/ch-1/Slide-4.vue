<script setup lang="ts">
import QuestionSwappableChoices from '@/components/story/questions/QuestionSwappableChoices.vue';

const bg = '/assets/story/bg/1-1.png';

const choices = ['Team spirit', 'Equal playing time', 'Regular training attendance', 'Current performance'];
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="relative h-full">
        <QuestionSwappableChoices
            :question-id="14"
            question="Define the order of importance of your selection criteria."
            hint="most important at the top, least important at the bottom"
            :choices="choices"
        />
    </section>
</template>
