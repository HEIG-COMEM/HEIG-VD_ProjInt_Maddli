<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/1.png';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="h-full">
        <Character
            type="coach"
            :scale="0.2"
            :poseNumber="3"
            :chNumber="1"
            class="!-top-[20%] !left-[10%] md:!-top-[20%] md:!left-[15%] xl:!left-[20%] xl:!top-[30%] 2xl:!left-[30%]"
        />
        <DialogBubble
            class="!left-[25%] !top-[15%] !max-w-sm md:!left-[25%] md:!top-[5%] md:!max-w-lg xl:!left-[20%] xl:!top-[15%] xl:!max-w-xl 2xl:!left-[32%]"
            text="Once your choices are made, you will send the list to the match official for validation before the game."
        />
    </section>
</template>
