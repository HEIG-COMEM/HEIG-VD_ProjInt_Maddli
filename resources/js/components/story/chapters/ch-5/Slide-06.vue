<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/5-5.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="relative h-full">
        <Character
            type="parent"
            :scale="0.2"
            :poseNumber="4"
            :chNumber="5"
            class="!-top-[22%] !left-[15%] md:!left-[25%] xl:!left-[32%] xl:!top-[30%] 2xl:!left-[30%]"
        />
        <Character
            type="parent"
            :scale="0.18"
            :poseNumber="5"
            :chNumber="5"
            class="!-top-[20%] !left-[60%] md:!left-[65%] xl:!left-[70%] xl:!top-[30%] 2xl:!left-[70%] 2xl:!top-[40%]"
        />
        <Character
            type="parent"
            :scale="0.18"
            :poseNumber="6"
            :chNumber="5"
            class="!-top-[35%] !left-[75%] md:!left-[78%] xl:!left-[90%] xl:!top-[30%] 2xl:!top-[35%]"
        />
        <DialogBubble
            tailPosition="right"
            class="!-left-5 !top-0 !max-w-[10rem] md:!max-w-[16rem] xl:!-left-10 xl:!top-[8%] xl:!max-w-xs 2xl:!top-[10%] 2xl:!max-w-sm"
            text="It's always the same players on the field!"
        />
    </section>
</template>
