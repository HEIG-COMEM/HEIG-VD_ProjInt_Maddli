<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/2-2.png';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="relative h-full">
        <Character
            type="coach"
            :scale="0.2"
            :poseNumber="1"
            :chNumber="2"
            class="!-top-[20%] !left-[10%] md:!-top-[20%] md:!left-[15%] xl:!left-[30%] xl:!top-[30%] 2xl:!left-[25%]"
        />
        <DialogBubble
            class="!left-[20%] !top-[10%] !max-w-xs md:!left-[25%] md:!top-[5%] xl:!left-[28%] xl:!top-[20%] xl:!max-w-lg 2xl:!left-[25%]"
            text="The game starts in less than an hour. It’s time to warm-up."
        />
    </section>
</template>
