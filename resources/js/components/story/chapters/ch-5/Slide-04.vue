<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';

const bg = '/assets/story/bg/3-2_4-2_5-2.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="h-full">
        <Character
            type="coach"
            :scale="0.2"
            :poseNumber="3"
            :chNumber="5"
            class="!-top-[30%] !left-[20%] md:!-top-[20%] md:!left-[20%] xl:!left-[35%] xl:!top-[30%] 2xl:!left-[35%]"
        />
        <img src="/assets/story/ch-5/elements/dialogBubble-1.svg" class="absolute !right-0 !top-[20%] h-24 md:!h-32 xl:!h-56" />
    </section>
</template>
