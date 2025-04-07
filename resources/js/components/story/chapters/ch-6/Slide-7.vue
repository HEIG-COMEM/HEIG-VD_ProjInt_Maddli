<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/7.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="h-full py-16">
        <div class="relative flex h-full flex-col justify-between">
            <Character
                type="player"
                :scale="0.2"
                :poseNumber="3"
                :chNumber="6"
                class="!-top-1/2 !left-[70%] md:!-top-1/3 md:!left-[70%] lg:!left-[70%] lg:!top-[30%] lg:!scale-[0.7] xl:!scale-[0.8]"
            />
            <DialogBubble
                class="!-top-[0%] !left-[30%] md:!left-[35%] lg:!left-[35%] lg:!top-[20%] xl:!left-[35%] 2xl:!left-[35%]"
                text="Thank you for your help coach."
                tail-position="right"
            />
        </div>
    </section>
</template>
