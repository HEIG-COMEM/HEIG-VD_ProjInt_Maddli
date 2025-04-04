<script setup lang="ts">
import TheCoach from '@/components/story/characters/TheCoach.vue';

const bg = '/assets/story/bg/1.png';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="h-full">
        <div class="flex h-full w-full flex-col items-center justify-center">
            <TheCoach :scale="1.2" :poseNumber="5" :chNumber="1" class="xl:!-bottom-2/5 !-bottom-[60%] !left-1/4" />
        </div>
    </section>
</template>
