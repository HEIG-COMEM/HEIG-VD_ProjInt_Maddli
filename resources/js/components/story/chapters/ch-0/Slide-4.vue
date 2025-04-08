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
            <div class="relative h-1/2">
                <DialogBubble
                    text="You will step into the role of a football coach and follow me through a typical match day"
                    tailPosition="right"
                    class="!-left-0 !-top-1/4 object-contain md:!left-[15%] xl:!left-[20%] 2xl:!left-1/3"
                />
                <Character
                    type="coach"
                    :scale="0.2"
                    :poseNumber="4"
                    :chNumber="0"
                    class="!-bottom-[400%] !left-3/4 md:!-bottom-[350%] xl:!-bottom-[150%]"
                />
            </div>
        </div>
    </section>
</template>
