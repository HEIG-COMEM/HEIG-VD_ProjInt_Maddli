<script setup lang="ts">
import TheCoach from '@/components/story/characters/TheCoach.vue';
import Caption from '@/components/story/ui/Caption.vue';
import { MoveDown, MoveLeft, MoveRight, MoveUp, Timer } from 'lucide-vue-next';
</script>

<template>
    <section data-auto-animate data-background-color="#321C16" class="h-full">
        <div class="relative flex h-full flex-col justify-between">
            <div class="flex flex-col items-start justify-center gap-2 font-baloo text-white md:gap-8">
                <h1 class="max-w-sm text-left text-xl font-bold sm:text-2xl md:text-3xl lg:text-6xl">Hello Coach Simulation</h1>
                <div data-id="lead" class="text-left text-lg sm:text-xl md:text-2xl lg:text-3xl">
                    How to become a coach?
                    <div class="mt-1 flex items-center text-sm sm:text-lg md:mt-4 md:text-xl lg:text-2xl">
                        <Timer class="mr-2" />
                        Duration: 7 minutes
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-end">
                <div class="flex flex-col items-center justify-center gap-4">
                    <div class="hidden flex-col items-center justify-center gap-4 lg:flex">
                        <div>
                            <MoveUp
                                class="h-8 w-8 rounded-md border-2 border-gray-400 p-1 text-gray-400 sm:h-10 sm:w-10 md:h-12 md:w-12 md:border-4 md:p-2 lg:h-16 lg:w-16"
                            />
                        </div>
                        <div class="flex w-full items-center justify-center gap-4">
                            <MoveLeft
                                class="h-8 w-8 rounded-md border-2 border-blue-500 p-1 text-blue-500 sm:h-10 sm:w-10 md:h-12 md:w-12 md:border-4 md:p-2 lg:h-16 lg:w-16"
                            />
                            <MoveDown
                                class="h-8 w-8 rounded-md border-2 border-gray-400 p-1 text-gray-400 sm:h-10 sm:w-10 md:h-12 md:w-12 md:border-4 md:p-2 lg:h-16 lg:w-16"
                            />
                            <MoveRight
                                class="h-8 w-8 rounded-md border-2 border-blue-500 p-1 text-blue-500 sm:h-10 sm:w-10 md:h-12 md:w-12 md:border-4 md:p-2 lg:h-16 lg:w-16"
                            />
                        </div>
                    </div>
                    <Caption class="!static">
                        <p class="text-base">
                            Use your <span class="font-bold">keyboard arrows</span> to play ! Or tap with your <span class="font-bold">finger</span>
                        </p>
                    </Caption>
                </div>
            </div>
            <TheCoach :scale="0.2" :poseNumber="1" :chNumber="0" class="!-top-1/3 !left-0 md:!left-1/4 lg:!left-1/4 lg:!top-1/2" />
        </div>
    </section>
</template>
