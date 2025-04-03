<script setup lang="ts">
import TheCoach from '@/components/story/characters/TheCoach.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';
</script>

<template>
    <section data-auto-animate data-background-color="#321C16" class="relative h-full">
        <div class="flex h-full flex-col justify-between">
            <div class="flex flex-col items-start justify-center gap-8 text-white">
                <h1 class="max-w-sm text-left font-baloo text-6xl font-bold">Hello Coach Simulation</h1>
                <div data-id="lead" class="text-left font-baloo text-3xl">Great job coach!</div>
            </div>
            <DialogBubble
                text="Now is the time to transform your goals into action."
                tailPosition="left"
                class="!left-[40%] !top-[10%] object-contain xl:!left-[35%]"
            />
            <TheCoach :scale="1.2" :poseNumber="3" :chNumber="8" class="!-bottom-2/3 !left-1/3 xl:!left-1/3" />
        </div>
    </section>
</template>
