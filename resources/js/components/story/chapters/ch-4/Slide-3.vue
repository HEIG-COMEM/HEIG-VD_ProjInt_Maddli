<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/4-3.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="relative h-full">
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="1"
            :chNumber="4"
            class="!-top-[20%] !left-0 md:!-top-[20%] md:!left-[5%] xl:!left-[20%] xl:!top-[30%] 2xl:!left-[20%]"
        />
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="2"
            :chNumber="4"
            class="!-top-[20%] !left-[30%] md:!-top-[20%] md:!left-[35%] xl:!left-[60%] xl:!top-[30%] 2xl:!left-[55%]"
        />
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="3"
            :chNumber="4"
            class="!-top-[20%] !left-[30%] md:!-top-[20%] md:!left-[35%] xl:!left-[60%] xl:!top-[30%] 2xl:!left-[55%]"
        />
        <DialogBubble
            class="!left-[8%] !top-[20%] !max-w-[12rem] md:!left-[12%] md:!top-[10%] md:!max-w-[16rem] xl:!left-[22%] xl:!top-[20%] xl:!max-w-sm 2xl:!left-[22%] 2xl:!top-[20%]"
            text="Ugh, this sucks! They’re not even that good!"
        />
    </section>
</template>
