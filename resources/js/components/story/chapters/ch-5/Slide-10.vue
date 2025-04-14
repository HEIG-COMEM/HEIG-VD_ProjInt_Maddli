<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/5-6.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="relative h-full">
        <Character
            type="parent"
            :scale="0.2"
            :poseNumber="7"
            :chNumber="5"
            class="!-top-[22%] !left-[18%] md:!-top-[15%] md:!left-[22%] xl:!left-[32%] xl:!top-[30%] 2xl:!left-[30%]"
        />
        <Character
            type="parent"
            :scale="0.2"
            :poseNumber="8"
            :chNumber="5"
            class="!-top-[15%] !left-[60%] md:!left-[65%] xl:!left-[70%] xl:!top-[40%]"
        />
        <Character
            type="parent"
            :scale="0.2"
            :poseNumber="9"
            :chNumber="5"
            class="!-top-[40%] !left-[75%] md:!left-[78%] xl:!left-[90%] xl:!top-[25%]"
        />
        <DialogBubble
            tailPosition="right"
            class="!-left-10 !top-0 !max-w-[12rem] md:!max-w-[16rem] xl:!-left-10 xl:!top-[8%] xl:!max-w-xs 2xl:!top-[10%] 2xl:!max-w-sm"
            text="I understand now, I’m sorry. I see that effort and teamwork matter."
        />
    </section>
</template>
