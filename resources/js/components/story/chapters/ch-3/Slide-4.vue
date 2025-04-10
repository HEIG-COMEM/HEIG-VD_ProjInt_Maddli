<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';

const bg = '/assets/story/bg/3-3.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="relative h-full">
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="1"
            :chNumber="3"
            class="!-top-[40%] !left-[10%] md:!-top-[35%] md:!left-[10%] xl:!left-[15%] xl:!top-[5%] 2xl:!left-[20%] 2xl:!top-[10%]"
        />
        <Character
            type="player"
            :scale="0.17"
            :poseNumber="2"
            :chNumber="3"
            class="!left-[40%] !top-[5%] md:!left-[50%] xl:!left-[70%] xl:!top-[15%]"
        />
        <img
            src="/assets/story/ch-3/elements/2.svg"
            class="absolute !left-[48%] !top-[58%] z-[1001] h-24 md:!left-[54%] md:!top-[52%] md:!h-28 xl:!left-[48%] xl:!top-[35%] xl:!h-56 2xl:!left-[52%] 2xl:!top-[40%]"
        />
    </section>
</template>
