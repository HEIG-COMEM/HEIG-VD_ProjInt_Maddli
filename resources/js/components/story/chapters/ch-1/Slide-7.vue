<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';
import Smartphone from '@/components/story/ui/Smartphone.vue';

const bg = '/assets/story/bg/1.png';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="relative h-full">
        <div class="relative flex h-full w-full flex-row items-center justify-end">
            <Character
                type="coach"
                :scale="0.2"
                :poseNumber="4"
                :chNumber="1"
                class="!-top-1/3 !left-0 md:!-top-1/3 lg:!top-[20%] lg:!scale-[0.7] xl:!scale-[0.8]"
            />
            <DialogBubble
                class="!left-[10%] !top-0 !max-w-[15rem] md:!left-[10%] md:!max-w-xs lg:!left-[15%] lg:!top-[10%] xl:!left-[12%] xl:!max-w-sm 2xl:!left-[10%]"
                text="And you send a message to your players in the group chat."
            />
            <Smartphone
                :variant="1"
                :position="{ top: 50, left: 60, unit: '%' }"
                :scale="0.2"
                class="md:!scale-[0.35] lg:!scale-[0.45] xl:!right-[8%] xl:!scale-[0.65] 2xl:!right-[12%]"
            />
        </div>
    </section>
</template>
