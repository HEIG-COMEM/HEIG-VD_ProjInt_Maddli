<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/4-4.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="relative h-full">
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="8"
            :chNumber="4"
            class="!-top-[22%] !left-[0%] md:!-top-[20%] md:!left-[5%] xl:!left-[10%] xl:!top-[30%] 2xl:!left-[10%]"
        />
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="9"
            :chNumber="4"
            class="!-top-[22%] !left-[20%] md:!-top-[20%] md:!left-[25%] xl:!left-[35%] xl:!top-[30%] 2xl:!left-[30%]"
        />
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="10"
            :chNumber="4"
            class="!-top-[25%] !left-[45%] md:!-top-[25%] md:!left-[45%] xl:!left-[60%] xl:!top-[25%] 2xl:!left-[55%]"
        />
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="11"
            :chNumber="4"
            class="!-top-[20%] !left-[80%] md:!-top-[15%] md:!left-[80%] xl:!left-[92%] xl:!top-[35%]"
        />
        <DialogBubble
            tailPosition="right"
            class="!left-[58%] !top-0 !max-w-[10rem] md:!left-[58%] md:!max-w-[12rem] xl:!left-[64%] xl:!top-[8%] xl:!max-w-[16rem] 2xl:!left-[60%] 2xl:!top-[10%] 2xl:!max-w-sm"
            text="Alright, let’s get back out there! We’re ready, we got this!"
        />
    </section>
</template>
