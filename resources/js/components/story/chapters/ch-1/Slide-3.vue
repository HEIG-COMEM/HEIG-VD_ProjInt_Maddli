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
            :poseNumber="2"
            :chNumber="1"
            class="!-top-[20%] !left-[10%] md:!-top-[20%] md:!left-[15%] xl:!left-[20%] xl:!top-[30%] 2xl:!left-[30%]"
        />
        <DialogBubble
            class="!left-[20%] !top-[10%] !max-w-xs md:!left-[25%] md:!top-0 xl:!left-[23%] xl:!top-[15%] xl:!max-w-md 2xl:!left-[32%]"
            text="Unfortunately, you can't call up everyone, so you have to make choices."
        />
    </section>
</template>
