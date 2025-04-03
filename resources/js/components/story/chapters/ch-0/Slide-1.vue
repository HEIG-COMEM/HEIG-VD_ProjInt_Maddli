<script setup lang="ts">
import TheCoach from '@/components/story/characters/TheCoach.vue';
import Caption from '@/components/story/ui/Caption.vue';
import { MoveDown, MoveLeft, MoveRight, MoveUp, Timer } from 'lucide-vue-next';
</script>

<template>
    <section data-auto-animate data-background-color="#321C16" class="relative h-full">
        <div class="flex h-full flex-col justify-between">
            <div class="flex flex-col items-start justify-center gap-8 text-white">
                <h1 class="font-baloo max-w-sm text-left text-6xl font-bold">Hello Coach Simulation</h1>
                <div data-id="lead" class="font-baloo text-left text-3xl">
                    How to become a coach?
                    <div class="mt-4 flex items-center text-xl">
                        <Timer class="mr-2" />
                        Duration: 7 minutes
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-end">
                <div class="flex flex-col items-center justify-center gap-4">
                    <div class="flex flex-col items-center justify-center gap-4">
                        <div>
                            <MoveUp class="h-16 w-16 rounded-md border-4 border-gray-400 p-2 text-gray-400" />
                        </div>
                        <div class="flex w-full items-center justify-center gap-4">
                            <MoveLeft class="h-16 w-16 rounded-md border-4 border-blue-500 p-2 text-blue-500" />
                            <MoveDown class="h-16 w-16 rounded-md border-4 border-gray-400 p-2 text-gray-400" />
                            <MoveRight class="h-16 w-16 rounded-md border-4 border-blue-500 p-2 text-blue-500" />
                        </div>
                    </div>
                    <Caption class="!static">
                        <p>
                            Use your <span class="font-bold">keyboard arrows</span> to play ! Or tap with your <span class="font-bold">finger</span>
                        </p>
                    </Caption>
                </div>
            </div>
            <TheCoach :scale="1.2" :poseNumber="1" :chNumber="0" class="!-bottom-2/3 !left-1/3 xl:!left-1/2" />
        </div>
    </section>
</template>
