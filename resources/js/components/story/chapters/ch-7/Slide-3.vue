<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/7-2.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="relative h-full">
        <Character
            type="coach"
            :scale="0.2"
            :poseNumber="3"
            :chNumber="1"
            class="!-top-[40%] !left-0 md:!-top-[30%] md:!left-[10%] xl:!left-[25%] xl:!top-[30%] 2xl:!left-[20%]"
        />
        <Character
            type="parent"
            :scale="0.2"
            :poseNumber="3"
            :chNumber="7"
            class="!-top-[40%] !left-[50%] md:!-top-[30%] md:!left-[60%] xl:!left-[65%] xl:!top-[30%]"
        />
        <Character
            type="parent"
            :scale="0.2"
            :poseNumber="4"
            :chNumber="7"
            class="!-top-[20%] !left-[75%] md:!-top-[15%] md:!left-[80%] xl:!left-[85%] xl:!top-[45%]"
        />
        <DialogBubble
            class="!-top-[5%] !left-[12%] max-w-[15rem] md:!left-[20%] md:!max-w-xs xl:!left-[25%] xl:!top-[5%] 2xl:!left-[20%] 2xl:!top-[15%] 2xl:!max-w-md"
            text="It’s a great time for you to share a moment with the parents and give a feedback."
        />
    </section>
</template>
