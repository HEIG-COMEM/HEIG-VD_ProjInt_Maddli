<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';
import { storyUtils } from '@/stores/storyUtils';
import { onBeforeUnmount, watch } from 'vue';

const bg = '/assets/story/bg/2-4.png';
const audio = new Audio('/assets/story/ch-2/sfx/s4.mp3');

const slideIndex = 16; // TODO : Update dynamically

watch(
    () => storyUtils.getCurrentSlideIndex(),
    (newIndex) => {
        if (newIndex === slideIndex) {
            audio.play();
        } else if (audio.currentTime > 0) {
            audio.pause();
            audio.currentTime = 0;
        }
    },
);

onBeforeUnmount(() => {
    audio.pause();
    audio.currentTime = 0;
});
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="relative h-full">
        <Character
            type="player"
            :scale="0.1"
            :poseNumber="3"
            :chNumber="2"
            class="!-top-[60%] !left-0 md:!-top-[60%] md:!left-[5%] xl:!left-[10%] xl:!top-[5%] 2xl:!left-[15%]"
        />
        <Character
            type="player"
            :scale="0.1"
            :poseNumber="4"
            :chNumber="2"
            class="!-top-[60%] !left-[15%] md:!-top-[60%] md:!left-[15%] xl:!left-[25%] xl:!top-[5%] 2xl:!left-[30%]"
        />
        <Character
            type="coach"
            :scale="0.2"
            :poseNumber="2"
            :chNumber="2"
            class="!-top-[20%] !left-[80%] md:!-top-[20%] md:!left-[80%] xl:!left-[90%] xl:!top-[40%] 2xl:!left-[85%]"
        />
        <DialogBubble
            tailPosition="right"
            class="!left-[43%] !top-0 !max-w-[16rem] md:!left-[38%] md:!max-w-sm xl:!left-[45%] xl:!top-[20%] xl:!max-w-md 2xl:!left-[45%] 2xl:!top-[25%]"
            text="The atmosphere is lighthearted, and some players are joking around instead of focusing on the warm-up."
        />
    </section>
</template>
