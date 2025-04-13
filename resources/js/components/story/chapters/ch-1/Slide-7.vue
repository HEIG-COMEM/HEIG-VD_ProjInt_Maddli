<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';
import Smartphone from '@/components/story/ui/Smartphone.vue';
import { storyUtils } from '@/stores/storyUtils';
import { onBeforeUnmount, watch } from 'vue';

const bg = '/assets/story/bg/1-1.png';
const audio = new Audio('/assets/story/ch-1/sfx/s7.mp3');

const slideIndex = 11; // TODO : Update dynamically

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
            type="coach"
            :scale="0.2"
            :poseNumber="4"
            :chNumber="1"
            class="!-top-[20%] !left-0 md:!-top-[10%] xl:!left-[15%] xl:!top-[40%] 2xl:!left-[15%]"
        />
        <DialogBubble
            class="!left-[10%] !top-[15%] !max-w-[16rem] md:!left-[8%] md:!top-[10%] md:!max-w-xs xl:!left-[16%] xl:!top-[25%] xl:!max-w-sm 2xl:!left-[15%]"
            text="And you send a message to your players in the group chat."
        />
        <Smartphone
            :variant="1"
            :scale="0.2"
            class="!-top-[40%] !left-[50%] md:!-top-[55%] xl:!-top-[5%] xl:!scale-[0.75] 2xl:!-top-[12%] 2xl:!scale-[0.70]"
        />
    </section>
</template>
