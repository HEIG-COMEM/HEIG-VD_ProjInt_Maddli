<script setup lang="ts">
import TheCoach from '@/components/story/characters/TheCoach.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/1.png';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="h-full">
        <div class="relative flex h-full flex-col justify-between">
            <TheCoach
                :scale="0.2"
                :poseNumber="1"
                :chNumber="1"
                class="!-top-1/2 !left-0 md:!-top-1/3 md:!left-[10%] lg:!left-[10%] lg:!top-[20%] lg:!scale-[0.7] xl:!scale-[0.8]"
            />
            <DialogBubble
                class="!left-[12%] !top-[5%] !max-w-xs md:!left-[20%] lg:!left-[25%] lg:!top-[20%] xl:!left-[23%] 2xl:!left-[20%]"
                text="Tomorrow is match day, you need to set up the match sheet."
            />
        </div>
    </section>
</template>
