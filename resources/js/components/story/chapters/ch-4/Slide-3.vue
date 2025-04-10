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
            class="!-top-[20%] !left-0 md:!-top-[20%] md:!left-[5%] xl:!left-[20%] xl:!top-[30%] 2xl:!left-[15%]"
        />
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="2"
            :chNumber="4"
            class="!-top-[50%] !left-[35%] !scale-[0.4] md:!-top-[35%] md:!left-[40%] md:!scale-[0.5] xl:!left-[50%] xl:!top-[20%] xl:!scale-[1] 2xl:!left-[45%] 2xl:!top-[12%]"
        />
        <Character
            type="player"
            :scale="0.2"
            :poseNumber="3"
            :chNumber="4"
            class="!-top-[30%] !left-[60%] md:!-top-[20%] md:!left-[60%] xl:!left-[80%] xl:!top-[35%] 2xl:!left-[75%]"
        />
        <DialogBubble
            class="!left-[10%] !top-[20%] !max-w-[10rem] md:!left-[12%] md:!top-[10%] md:!max-w-[16rem] xl:!left-[24%] xl:!top-[20%] xl:!max-w-xs 2xl:!left-[18%] 2xl:!top-[20%] 2xl:!max-w-sm"
            text="Ugh, this sucks! They’re not even that good!"
        />
    </section>
</template>
