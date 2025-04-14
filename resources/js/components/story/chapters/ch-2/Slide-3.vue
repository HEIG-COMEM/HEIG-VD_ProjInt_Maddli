<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';
import { storyUtils } from '@/stores/storyUtils';
import { onBeforeUnmount, watch } from 'vue';

const bg = '/assets/story/bg/2-3.png';
const audio = new Audio('/assets/story/ch-2/sfx/s3.mp3');

const slideIndex = 15; // TODO : Update dynamically

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
            :scale="0.2"
            :poseNumber="1"
            :chNumber="2"
            class="!-top-[20%] !left-0 md:!-top-[20%] md:!left-[5%] xl:!left-[20%] xl:!top-[30%] 2xl:!left-[20%]"
        />
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="2"
            :chNumber="2"
            class="!-top-[20%] !left-[30%] md:!-top-[20%] md:!left-[35%] xl:!left-[60%] xl:!top-[30%] 2xl:!left-[55%]"
        />
        <DialogBubble
            class="!left-[8%] !top-[20%] !max-w-[12rem] md:!left-[12%] md:!top-[10%] md:!max-w-[16rem] xl:!left-[22%] xl:!top-[20%] xl:!max-w-sm 2xl:!left-[22%] 2xl:!top-[20%]"
            text="Ha ha ha !"
        />
    </section>
</template>
