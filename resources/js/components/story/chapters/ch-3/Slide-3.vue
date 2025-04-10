<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';

const bg = '/assets/story/bg/3-3.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="relative h-full">
        <Character
            type="coach"
            :scale="0.2"
            :poseNumber="2"
            :chNumber="3"
            class="!-top-[20%] !left-[10%] md:!-top-[20%] md:!left-[15%] xl:!left-[30%] xl:!top-[30%] 2xl:!left-[25%]"
        />
        <img src="/assets/story/ch-3/elements/dialogBubble-1.svg" class="absolute !right-0 !top-[30%] h-24 md:!h-32 xl:!h-56" />
    </section>
</template>
