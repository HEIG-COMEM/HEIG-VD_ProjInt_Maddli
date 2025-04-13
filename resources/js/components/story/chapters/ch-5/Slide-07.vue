<script setup lang="ts">
import QuestionMultipleChoice from '@/components/story/questions/QuestionMultipleChoice.vue';

const bg = '/assets/story/bg/5-5.png';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="h-full">
        <QuestionMultipleChoice
            :question-id="57"
            question="A parent is upset about their child’s lack of playing time. What do you do?"
            :answers="[
                { id: 1, q: 'I suggest having a private meeting later to avoid a heated discussion in front of others.' },
                {
                    id: 2,
                    q: 'I stay calm and explain my decisions, emphasizing the team’s collective interest and the importance of effort in training.',
                },
                { id: 3, q: 'I dismiss the complaint and end the conversation quickly to avoid further conflict.' },
            ]"
            :correctAnswer="2"
        />
    </section>
</template>
