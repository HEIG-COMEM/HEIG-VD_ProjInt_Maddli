<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/7-2.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="relative h-full">
        <Character
            type="parent"
            :scale="0.2"
            :poseNumber="1"
            :chNumber="7"
            class="!-top-[40%] !left-[50%] md:!-top-[30%] md:!left-[50%] xl:!left-[65%] xl:!top-[30%]"
        />
        <Character
            type="parent"
            :scale="0.2"
            :poseNumber="2"
            :chNumber="7"
            class="!-top-[20%] !left-[75%] md:!-top-[15%] md:!left-[70%] xl:!left-[85%] xl:!top-[45%]"
        />
        <DialogBubble
            class="!left-[20%] !top-0 max-w-[15rem] md:!left-[27%] xl:!left-[32%] xl:!top-[10%] xl:max-w-xs 2xl:!left-[35%] 2xl:!top-[10%] 2xl:max-w-xs"
            text="Well done coach ! It was a great game."
            tail-position="right"
        />
    </section>
</template>
