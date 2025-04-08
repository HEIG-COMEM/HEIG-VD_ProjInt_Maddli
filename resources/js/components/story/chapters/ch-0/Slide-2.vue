<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';
import { storyUtils } from '@/stores/storyUtils';
import { Timer } from 'lucide-vue-next';
</script>

<template>
    <section data-auto-animate data-background-color="#006565" class="relative h-full py-16">
        <div class="flex h-full flex-col justify-between">
            <div class="flex flex-col items-start justify-center gap-2 font-baloo text-white md:gap-8">
                <h1 class="max-w-sm text-left text-xl font-bold sm:text-2xl md:text-3xl lg:text-6xl">Hello Coach Simulation</h1>
                <div data-id="lead" class="text-left text-lg sm:text-xl md:text-2xl lg:text-3xl">
                    How to become a coach?
                    <div class="mt-1 flex items-center text-sm sm:text-lg md:mt-4 md:text-xl lg:text-2xl">
                        <Timer class="mr-2" />
                        Duration: {{ storyUtils.getDuration() }}
                    </div>
                </div>
            </div>
            <DialogBubble
                text="Welcome to the Hello Coach Simulation !"
                tailPosition="right"
                class="!left-[40%] !top-[12%] sm:!max-w-[12rem] md:!left-[40%] md:!top-[5%] md:!max-w-[16rem] xl:!left-[35%] xl:!top-[10%] xl:!max-w-sm"
            />
            <Character
                type="coach"
                :scale="0.2"
                :poseNumber="2"
                :chNumber="0"
                class="!-top-[30%] !left-[60%] md:!-top-[25%] md:!left-[62%] xl:!left-[78%] xl:!top-[20%] 2xl:!left-[70%]"
            />
        </div>
    </section>
</template>
