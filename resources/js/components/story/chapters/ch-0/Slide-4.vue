<script setup lang="ts">
import TheCoach from '@/components/story/characters/TheCoach.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';
import { Timer } from 'lucide-vue-next';
</script>

<template>
    <section data-auto-animate data-background-color="#321C16" class="relative h-full">
        <div class="flex h-full flex-col justify-between">
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
            <div class="relative flex h-96 justify-center">
                <DialogBubble
                    text="You will step into the role of a football coach and follow me through a typical match day"
                    tailPosition="right"
                    class="!-top-1/4 !left-[20%] object-contain xl:!left-1/3"
                />
                <TheCoach :scale="0.2" :poseNumber="4" :chNumber="0" class="!-bottom-[120%] !left-3/4 xl:!-bottom-full" />
            </div>
        </div>
    </section>
</template>
