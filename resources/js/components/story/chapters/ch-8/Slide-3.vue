<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '#006565';
</script>

<template>
    <section data-auto-animate :data-background-color="bg" class="relative h-full py-16">
        <div class="flex h-full flex-col justify-between">
            <div class="flex flex-col items-start justify-center gap-2 font-baloo text-white md:gap-8">
                <h1 class="max-w-sm text-left text-xl font-bold sm:text-2xl md:text-3xl lg:text-6xl">Hello Coach Simulation</h1>
                <div data-id="lead" class="text-left text-lg sm:text-xl md:text-2xl lg:text-3xl">Great job coach!</div>
            </div>
            <DialogBubble
                text="Now is the time to transform your goals into action."
                tailPosition="left"
                class="!left-[45%] !top-[10%] md:!max-w-xs xl:!top-[20%] xl:!max-w-md"
            />
            <Character
                type="coach"
                :scale="0.2"
                :poseNumber="3"
                :chNumber="8"
                class="!-top-[20%] !left-[35%] xl:!left-[40%] xl:!top-[40%] 2xl:!left-[40%] 2xl:!top-[35%]"
            />
        </div>
    </section>
</template>
