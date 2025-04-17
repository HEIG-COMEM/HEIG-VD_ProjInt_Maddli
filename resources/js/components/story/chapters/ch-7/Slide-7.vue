<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/7-3.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="relative h-full">
        <Character
            type="parent"
            :scale="0.2"
            :poseNumber="5"
            :chNumber="7"
            class="!-top-[40%] !left-[30%] md:!-top-[30%] md:!left-[30%] xl:!left-[40%] xl:!top-[30%]"
        />
        <Character
            type="parent"
            :scale="0.2"
            :poseNumber="6"
            :chNumber="7"
            class="!-top-[20%] !left-[73%] md:!-top-[15%] md:!left-[75%] xl:!left-[85%] xl:!top-[45%]"
        />
        <DialogBubble
            class="!left-[45%] !top-[5%] max-w-[15rem] md:!left-[41%] md:!max-w-xs xl:!left-[53%] xl:!top-[15%] 2xl:!left-[50%] 2xl:!top-[25%] 2xl:!max-w-md"
            text="Thanks, coach! It’s great to hear that. By the way, Lily loves to come to training."
            tail-position="right"
        />
    </section>
</template>
