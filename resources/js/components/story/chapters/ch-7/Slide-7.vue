<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/8.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="relative h-full">
        <div class="relative flex h-full flex-col justify-between">
            <Character
                type="parent"
                :scale="0.2"
                :poseNumber="6"
                :chNumber="7"
                class="!-top-1/2 !left-[70%] md:!-top-1/3 md:!left-[70%] lg:!left-[70%] lg:!top-[30%] lg:!scale-[0.7] xl:!scale-[0.8]"
            />
            <Character
                type="parent"
                :scale="0.2"
                :poseNumber="5"
                :chNumber="7"
                class="!-top-1/2 !left-[40%] md:!-top-1/3 md:!left-[40%] lg:!left-[35%] lg:!top-[30%] lg:!scale-[0.7] xl:!scale-[0.8]"
            />
            <DialogBubble
                class="!-top-[20%] !left-[40%] max-w-[15rem] md:!left-[45%] lg:!left-[55%] lg:!top-[10%] lg:max-w-xs xl:!left-[55%] 2xl:!left-[55%]"
                text="Thanks, coach! It’s great to hear that. By the way, Lily loves to come to training."
                tail-position="right"
            />
        </div>
    </section>
</template>
