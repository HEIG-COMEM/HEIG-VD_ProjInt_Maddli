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
                text="I am an ambassador of the Hello Coach program."
                tailPosition="left"
                class="!left-[50%] !top-[5%] !max-w-[16rem] md:!left-[50%] md:!top-[5%] md:!max-w-[20rem] xl:!left-[55%] xl:!top-[10%] xl:!max-w-md"
            />
            <Character
                type="coach"
                :scale="0.2"
                :poseNumber="3"
                :chNumber="0"
                class="!-top-[30%] !left-[35%] md:!-top-[25%] md:!left-[40%] xl:!left-[55%] xl:!top-[20%] 2xl:!left-[50%]"
            />
        </div>
    </section>
</template>
