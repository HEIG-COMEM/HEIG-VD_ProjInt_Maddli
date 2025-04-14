<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import Caption from '@/components/story/ui/Caption.vue';
import { storyUtils } from '@/stores/storyUtils';
import { MoveDown, MoveLeft, MoveRight, MoveUp, Timer } from 'lucide-vue-next';
</script>

<template>
    <section data-auto-animate data-background-color="#006565" class="h-full py-16">
        <div class="relative flex h-full flex-col justify-between">
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
            <div class="flex flex-col items-end">
                <div class="flex flex-col items-center justify-center gap-4">
                    <div
                        class="absolute right-[8%] top-[27%] flex items-center justify-center md:right-[5%] xl:right-[5.5%] xl:top-[44%] 2xl:right-[4.5%] 2xl:top-[58%]"
                    >
                        <div class="relative flex items-center justify-center">
                            <div class="absolute h-12 w-12 animate-ping rounded-full border-2 border-white opacity-50"></div>
                            <div class="absolute h-4 w-4 rounded-full border-2 border-white opacity-75"></div>
                            <div class="absolute h-8 w-8 animate-ping rounded-full border-2 border-white opacity-75"></div>
                        </div>
                    </div>
                    <img
                        src="/assets/story/ch-0/elements/touch.svg"
                        alt="Touch Icon"
                        class="absolute -right-[5%] top-[20%] h-24 w-24 -rotate-[30deg] lg:h-32 lg:w-32 xl:top-[40%] xl:h-40 xl:w-40 2xl:-right-[4%] 2xl:top-[55%]"
                    />
                    <div class="hidden flex-col items-center justify-center gap-4 lg:flex">
                        <div>
                            <MoveUp
                                class="h-8 w-8 rounded-md border-2 border-[#66A3A3] p-1 text-[#66A3A3] sm:h-10 sm:w-10 md:h-12 md:w-12 md:border-4 md:p-2 lg:h-16 lg:w-16"
                            />
                        </div>
                        <div class="flex w-full items-center justify-center gap-4">
                            <MoveLeft
                                class="h-8 w-8 rounded-md border-2 border-[#FFBF47] p-1 text-[#FFBF47] sm:h-10 sm:w-10 md:h-12 md:w-12 md:border-4 md:p-2 lg:h-16 lg:w-16"
                            />
                            <MoveDown
                                class="h-8 w-8 rounded-md border-2 border-[#66A3A3] p-1 text-[#66A3A3] sm:h-10 sm:w-10 md:h-12 md:w-12 md:border-4 md:p-2 lg:h-16 lg:w-16"
                            />
                            <MoveRight
                                class="h-8 w-8 rounded-md border-2 border-[#FFBF47] p-1 text-[#FFBF47] sm:h-10 sm:w-10 md:h-12 md:w-12 md:border-4 md:p-2 lg:h-16 lg:w-16"
                            />
                        </div>
                    </div>
                    <Caption class="!static">
                        <p class="font-normal">
                            Use your <span class="font-bold">keyboard arrows</span> to play ! Or tap with your <span class="font-bold">finger</span>
                        </p>
                    </Caption>
                </div>
            </div>
            <Character type="coach" :scale="0.2" :poseNumber="1" :chNumber="0" class="!-top-1/3 !left-0 md:!left-1/4 lg:!left-1/4 lg:!top-1/2" />
        </div>
    </section>
</template>
