<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/8.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="h-full">
        <div class="relative flex h-full flex-col justify-between">
            <Character
                type="parent"
                :scale="0.2"
                :poseNumber="2"
                :chNumber="7"
                class="!-top-1/2 !left-[70%] md:!-top-1/3 md:!left-[70%] lg:!left-[70%] lg:!top-[30%] lg:!scale-[0.7] xl:!scale-[0.8]"
            />
            <Character
                type="parent"
                :scale="0.2"
                :poseNumber="1"
                :chNumber="7"
                class="!-top-1/2 !left-[50%] md:!-top-1/3 md:!left-[50%] lg:!left-[50%] lg:!top-[30%] lg:!scale-[0.7] xl:!scale-[0.8]"
            />
            <DialogBubble
                class="!-top-[10%] !left-[20%] max-w-[15rem] md:!left-[45%] lg:!left-1/3 lg:!top-[20%] lg:max-w-xs xl:!left-1/3 2xl:!left-1/3"
                text="Well done coach ! It was a great game."
                tail-position="right"
            />
        </div>
    </section>
</template>
