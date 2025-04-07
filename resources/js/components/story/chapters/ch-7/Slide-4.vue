<script setup lang="ts">
import QuestionMultipleChoice from '@/components/story/questions/QuestionMultipleChoice.vue';

const bg = '/assets/story/bg/8.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="relative h-full">
        <div class="flex h-full flex-col items-center justify-center">
            <QuestionMultipleChoice
                question="What would you like to highlight in your feedback?"
                :answers="['The player\' improvements and dedication.', 'The players\' areas for improvement. ', 'The player\' weaknesses.']"
            />
        </div>
    </section>
</template>
