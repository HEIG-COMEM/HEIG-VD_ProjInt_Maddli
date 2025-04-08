<script setup lang="ts">
import QuestionMultipleChoice from '@/components/story/questions/QuestionMultipleChoice.vue';

const bg = '/assets/story/bg/6-1.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="relative h-full">
        <div class="flex h-full flex-col items-center justify-center">
            <QuestionMultipleChoice
                question="What do you do when a player comes to you with a personal problem ?"
                :answers="[
                    'I tell her to handle it on her own and focus on the next game.',
                    'I listen carefully, offer advice from my experience, and support her with empathy.',
                    'I avoid the conversation, unsure how to balance personal issues with my role as a coach.',
                ]"
            />
        </div>
    </section>
</template>
