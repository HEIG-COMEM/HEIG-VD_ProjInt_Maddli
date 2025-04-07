<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/1.png';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="h-full">
        <div class="flex h-full w-full flex-col items-center justify-center">
            <Character
                type="coach"
                :scale="0.2"
                :poseNumber="2"
                :chNumber="1"
                class="!-top-1/2 !left-0 md:!-top-1/3 md:!left-[10%] lg:!left-[10%] lg:!top-[20%] lg:!scale-[0.7] xl:!scale-[0.8]"
            />
            <DialogBubble
                class="xl:!max-w-lg!top-[5%] !left-[12%] !max-w-xs md:!left-[20%] md:!max-w-sm lg:!left-[25%] lg:!top-[25%] lg:!max-w-md xl:!left-[23%] xl:!top-[15%] 2xl:!left-[20%]"
                text="Unfortunately, you can't call up everyone, so you have to make choices."
            />
        </div>
    </section>
</template>
