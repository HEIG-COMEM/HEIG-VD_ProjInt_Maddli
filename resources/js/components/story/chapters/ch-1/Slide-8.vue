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
                class="!-top-[20%] !left-[20%] md:!-top-[10%] xl:!left-[30%] xl:!top-[40%]"
            />
            <Smartphone
                :variant="2"
                :scale="0.2"
                class="!-top-[40%] !left-[45%] md:!-top-[55%] xl:!-top-[5%] xl:!scale-[0.75] 2xl:!-top-[12%] 2xl:!scale-[0.70]"
            />
        </div>
    </section>
</template>
