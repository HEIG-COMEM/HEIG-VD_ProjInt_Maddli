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
            :chNumber="3"
            class="!-top-[20%] !left-[10%] md:!-top-[20%] md:!left-[15%] xl:!left-[30%] xl:!top-[30%] 2xl:!left-[25%]"
        />
        <DialogBubble
            class="!left-[25%] !top-[10%] !max-w-xs md:!left-[25%] md:!top-0 xl:!left-[35%] xl:!top-[15%] xl:!max-w-lg 2xl:!left-[30%]"
            text="The game is intense and players are a bit aggressive."
        />
    </section>
</template>
