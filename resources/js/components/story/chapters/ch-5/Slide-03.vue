<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/5-3.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="relative h-full">
        <Character
            type="coach"
            :scale="0.2"
            :poseNumber="2"
            :chNumber="5"
            class="!-top-[20%] !left-[5%] md:!-top-[20%] md:!left-[5%] xl:!left-[15%] xl:!top-[30%] 2xl:!left-[15%]"
        />
        <DialogBubble
            class="!left-[12%] !top-[5%] !max-w-[12rem] md:!top-0 md:!max-w-[16rem] xl:!left-[17%] xl:!top-[10%] xl:!max-w-sm 2xl:!left-[18%] 2xl:!top-[12%]"
            text="Your players are relieved, celebrating a hard-fought victory."
        />
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="1"
            :chNumber="5"
            class="!-top-[50%] !left-[10%] !scale-[0.3] md:!-top-[40%] md:!left-[20%] md:!scale-[0.4] xl:!left-[28%] xl:!top-[15%] xl:!scale-[0.8] 2xl:!left-[35%] 2xl:!top-[10%]"
        />
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="2"
            :chNumber="5"
            class="!-top-[40%] !left-[50%] !scale-[0.3] md:!-top-[30%] md:!left-[60%] md:!scale-[0.4] xl:!left-[70%] xl:!top-[20%] xl:!scale-[0.8] 2xl:!left-[70%] 2xl:!top-[10%]"
        />
    </section>
</template>
