<script setup lang="ts">
import QuestionSwappableChoices from '@/components/story/questions/QuestionSwappableChoices.vue';

const choices = ['Team spirit', 'Equal playing time', 'Regular training attendance', 'Current performance'];
</script>

<template>
    <section>
        <h1>Chapter 1 - Slide 4</h1>
        <QuestionSwappableChoices question="Define the order of importance of your selection criteria." :choices="choices" />
    </section>
</template>
