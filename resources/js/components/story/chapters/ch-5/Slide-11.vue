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
            :poseNumber="10"
            :chNumber="5"
            class="!-top-[22%] !left-[10%] md:!-top-[15%] md:!left-[10%] xl:!left-[15%] xl:!top-[30%]"
        />
        <Character
            type="parent"
            :scale="0.2"
            :poseNumber="11"
            :chNumber="5"
            class="!-top-[15%] !left-[55%] md:!left-[60%] xl:!left-[65%] xl:!top-[40%]"
        />
        <Character
            type="parent"
            :scale="0.2"
            :poseNumber="12"
            :chNumber="5"
            class="!-top-[40%] !left-[75%] md:!left-[78%] xl:!left-[90%] xl:!top-[25%]"
        />
        <DialogBubble
            tailPosition="left"
            class="!left-[18%] !top-0 !max-w-[12rem] md:!max-w-[16rem] xl:!left-[15%] xl:!top-[8%] xl:!max-w-xs 2xl:!left-[15%] 2xl:!top-[10%] 2xl:!max-w-sm"
            text="Thanks for taking the time to explain, coach."
        />
    </section>
</template>
