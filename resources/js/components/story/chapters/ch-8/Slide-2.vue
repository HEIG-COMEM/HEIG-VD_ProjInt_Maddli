<script setup lang="ts">
import TheCoach from '@/components/story/characters/TheCoach.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';
</script>

<template>
    <section data-auto-animate data-background-color="#321C16" class="relative h-full">
        <div class="flex h-full flex-col justify-between">
            <div class="flex flex-col items-start justify-center gap-2 font-baloo text-white md:gap-8">
                <h1 class="max-w-sm text-left text-xl font-bold sm:text-2xl md:text-3xl lg:text-6xl">Hello Coach Simulation</h1>
                <div data-id="lead" class="text-left text-lg sm:text-xl md:text-2xl lg:text-3xl">Great job coach!</div>
            </div>
            <DialogBubble
                text="It’s the first step into the world of football coaching."
                tailPosition="left"
                class="!left-[40%] !top-[10%] object-contain 2xl:!left-[40%] 2xl:!top-1/4"
            />
            <TheCoach
                :scale="0.2"
                :poseNumber="2"
                :chNumber="8"
                class="!-bottom-[200%] !left-1/4 md:!-bottom-[170%] md:!left-1/4 2xl:!-bottom-2/3 2xl:!left-1/3"
            />
        </div>
    </section>
</template>
