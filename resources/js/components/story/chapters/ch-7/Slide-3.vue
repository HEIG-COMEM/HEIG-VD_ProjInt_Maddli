<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/8.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="h-full">
        <div class="relative flex h-full flex-col justify-between">
            <Character
                type="coach"
                :scale="0.2"
                :poseNumber="3"
                :chNumber="1"
                class="!-top-1/2 !left-0 md:!-top-1/3 md:!left-[10%] lg:!left-[10%] lg:!top-[30%] lg:!scale-[0.7] xl:!scale-[0.8]"
            />
            <Character
                type="parent"
                :scale="0.2"
                :poseNumber="4"
                :chNumber="7"
                class="!-top-1/2 !left-[70%] md:!-top-1/3 md:!left-[70%] lg:!left-[70%] lg:!top-[30%] lg:!scale-[0.7] xl:!scale-[0.8]"
            />
            <Character
                type="parent"
                :scale="0.2"
                :poseNumber="3"
                :chNumber="7"
                class="!-top-1/2 !left-[50%] md:!-top-1/3 md:!left-[50%] lg:!left-[50%] lg:!top-[30%] lg:!scale-[0.7] xl:!scale-[0.8]"
            />
            <DialogBubble
                class="!left-[12%] !top-0 max-w-[15rem] md:!left-[20%] md:!max-w-xs lg:!left-[25%] lg:!top-[10%] xl:!left-[23%] 2xl:!left-[20%]"
                text="It’s a great time for you to share a moment with the parents and give a feedback."
            />
        </div>
    </section>
</template>
