<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import Smartphone from '@/components/story/ui/Smartphone.vue';
const bg = '/assets/story/bg/1.png';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="h-full">
        <div class="relative flex h-full w-full flex-col items-center justify-center">
            <Character
                type="coach"
                :scale="0.2"
                :poseNumber="5"
                :chNumber="1"
                class="!-top-1/2 !left-0 md:!-top-1/3 md:!left-[10%] lg:!left-[10%] lg:!top-[20%] lg:!scale-[0.7] xl:!scale-[0.8]"
            />
            <Smartphone
                :variant="2"
                :position="{ top: 50, left: 60, unit: '%' }"
                :scale="0.2"
                class="left-[30%] md:!left-[35%] md:!scale-[0.35] lg:!left-[38%] lg:!scale-[0.45] xl:!left-[42%] xl:!right-[8%] xl:!scale-[0.65] 2xl:!left-[45%] 2xl:!right-[20%]"
            />
        </div>
    </section>
</template>
