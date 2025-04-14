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
            :poseNumber="2"
            :chNumber="6"
            class="!-top-1/2 !left-[75%] md:!-top-1/3 md:!left-[80%] xl:!left-[85%] xl:!top-[20%] 2xl:!left-[85%]"
        />
        <DialogBubble
            class="!left-[35%] !top-0 !max-w-[16rem] md:!left-[32%] md:!top-[5%] md:!max-w-sm xl:!left-[42%] xl:!top-[10%] 2xl:!left-[50%]"
            text="I have my period, and I really don’t feel like changing in front of everyone..."
            tail-position="right"
        />
    </section>
</template>
