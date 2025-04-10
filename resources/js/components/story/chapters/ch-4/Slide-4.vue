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
            :poseNumber="4"
            :chNumber="4"
            class="!-top-[22%] !left-[5%] md:!-top-[20%] md:!left-[5%] xl:!left-[15%] xl:!top-[30%] 2xl:!left-[15%]"
        />
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="5"
            :chNumber="4"
            class="!-top-[22%] !left-[30%] md:!-top-[20%] md:!left-[25%] xl:!left-[40%] xl:!top-[30%] 2xl:!left-[40%]"
        />
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="6"
            :chNumber="4"
            class="!-top-[25%] !left-[57%] md:!-top-[25%] md:!left-[60%] xl:!left-[65%] xl:!top-[25%] 2xl:!left-[70%]"
        />
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="7"
            :chNumber="4"
            class="!-top-[20%] !left-[80%] md:!-top-[15%] md:!left-[80%] xl:!left-[90%] xl:!top-[35%] 2xl:!left-[90%]"
        />
        <DialogBubble
            tailPosition="right"
            class="!left-[40%] !top-[10%] !max-w-[10rem] md:!left-[43%] md:!top-[5%] md:!max-w-[16rem] xl:!left-[38%] xl:!top-[8%] xl:!max-w-xs 2xl:!left-[47%] 2xl:!top-[10%] 2xl:!max-w-sm"
            text="It's so unfair!"
        />
    </section>
</template>
