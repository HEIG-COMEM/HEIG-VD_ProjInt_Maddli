<script setup lang="ts">
import QuestionMultipleChoice from '@/components/story/questions/QuestionMultipleChoice.vue';

const bg = '/assets/story/bg/6-1.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="relative h-full">
        <div class="flex h-full flex-col items-center justify-center">
            <QuestionMultipleChoice
                :question-id="64"
                question="What do you do when a player comes to you with a personal problem ?"
                :answers="[
                    { id: 1, q: 'I tell her to handle it on her own and focus on the next game.' },
                    { id: 2, q: 'I listen carefully, offer advice from my experience, and support her with empathy.' },
                    { id: 3, q: 'I avoid the conversation, unsure how to balance personal issues with my role as a coach.' },
                ]"
                :correctAnswer="1"
            />
        </div>
    </section>
</template>
