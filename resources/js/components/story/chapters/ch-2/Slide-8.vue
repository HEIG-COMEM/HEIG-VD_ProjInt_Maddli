<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';

const bg = '/assets/story/bg/2-3.png';
const ball = '/assets/story/ch-2/elements/ball.svg';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="relative h-full">
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="5"
            :chNumber="2"
            class="!-top-[20%] !left-0 md:!-top-[5%] md:!left-[5%] xl:!left-[25%] xl:!top-[40%] 2xl:!left-[20%] 2xl:!top-[45%]"
        />
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="6"
            :chNumber="2"
            class="!-top-[40%] !left-[60%] !scale-[0.3] md:!-top-[30%] md:!left-[65%] md:!scale-[0.4] xl:!left-[75%] xl:!top-[20%] xl:!scale-[0.7] 2xl:!left-[75%] 2xl:!top-[25%] 2xl:!scale-[0.7]"
        />
        <div class="absolute !left-[35%] !top-[85%] md:!left-[30%] xl:!left-[40%] 2xl:!left-[35%]">
            <img :src="ball" class="h-10 w-10 md:!h-12 md:!w-12 xl:!h-24 xl:!w-24" />
        </div>
    </section>
</template>
