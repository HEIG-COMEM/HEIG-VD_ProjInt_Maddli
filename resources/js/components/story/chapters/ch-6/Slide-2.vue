<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/6-1.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="relative h-full">
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="1"
            :chNumber="6"
            class="!-top-1/2 !left-[70%] md:!-top-1/3 md:!left-[75%] xl:!left-[85%] xl:!top-[20%] 2xl:!left-[85%]"
        />
        <DialogBubble
            class="!left-[40%] !top-0 md:!left-[43%] md:!top-[5%] xl:!left-[48%] xl:!top-[15%] 2xl:!left-[55%] 2xl:!top-[20%]"
            text="I don’t want to shower."
            tail-position="right"
        />
    </section>
</template>
