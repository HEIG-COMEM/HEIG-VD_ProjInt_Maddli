<script setup lang="ts">
import QuestionMultipleChoice from '@/components/story/questions/QuestionMultipleChoice.vue';

const bg = '/assets/story/bg/7-2.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="relative h-full">
        <div class="flex h-full flex-col items-center justify-center">
            <QuestionMultipleChoice
                :question-id="74"
                question="What would you like to highlight in your feedback?"
                :answers="[
                    { id: 1, q: 'The player\' improvements and dedication.' },
                    { id: 2, q: 'The players\' areas for improvement. ' },
                    { id: 3, q: 'The player\' weaknesses.' },
                ]"
                :correctAnswer="1"
            />
        </div>
    </section>
</template>
