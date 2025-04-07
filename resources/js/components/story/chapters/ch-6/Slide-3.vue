<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/7.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="h-full">
        <div class="relative flex h-full flex-col justify-between">
            <Character
                type="player"
                :scale="0.2"
                :poseNumber="2"
                :chNumber="6"
                class="!-top-1/2 !left-[70%] md:!-top-1/3 md:!left-[70%] lg:!left-[70%] lg:!top-[30%] lg:!scale-[0.7] xl:!scale-[0.8]"
            />
            <DialogBubble
                class="!-top-[0%] !left-[30%] max-w-[15rem] md:!left-[35%] lg:!left-[45%] lg:!top-[10%] lg:max-w-xs xl:!left-[45%] 2xl:!left-[45%]"
                text="I have my period, and I really don’t feel like changing in front of everyone..."
                tail-position="right"
            />
        </div>
    </section>
</template>
