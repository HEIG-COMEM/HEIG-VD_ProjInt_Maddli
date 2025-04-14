<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/3-2_4-2_5-2.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="relative h-full">
        <Character
            type="coach"
            :scale="0.2"
            :poseNumber="1"
            :chNumber="4"
            class="!-top-[20%] !left-[10%] md:!-top-[20%] md:!left-[15%] xl:!left-[20%] xl:!top-[30%] 2xl:!left-[25%]"
        />
        <DialogBubble
            class="!left-[20%] !top-[10%] !max-w-xs md:!left-[25%] md:!top-[5%] xl:!left-[23%] xl:!top-[15%] xl:!max-w-lg 2xl:!left-[30%]"
            text="You are one goal down.. You need to find the right words to remotivate the team."
        />
    </section>
</template>
