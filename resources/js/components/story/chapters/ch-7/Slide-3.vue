<script setup lang="ts">
import Parent from '@/components/story/characters/Parent.vue';
import TheCoach from '@/components/story/characters/TheCoach.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';
</script>

<template>
    <section data-auto-animate data-background-image="/assets/story/bg/8.png" class="h-full">
        <div class="relative flex h-full w-full flex-row justify-around">
            <div class="relative w-1/2">
                <TheCoach
                    :scale="0.2"
                    :poseNumber="3"
                    :chNumber="1"
                    class="!-top-1/3 !left-0 md:!-top-1/3 md:!left-[10%] lg:!left-[10%] lg:!top-[20%] lg:!scale-[0.7] xl:!scale-[0.8]"
                />
                <DialogBubble
                    class="!-top-[10%] !left-[20%] w-max md:!left-[30%] lg:!left-[35%] lg:!top-[20%] xl:!left-[33%] 2xl:!left-[40%]"
                    text="It’s a great time for you to share a moment with the parents and give a feedback."
                />
            </div>
            <div class="relative w-1/2">
                <Parent
                    :scale="0.2"
                    :poseNumber="4"
                    :chNumber="7"
                    class="!-top-1/2 !left-1/2 md:!-top-1/3 md:!left-1/2 lg:!left-1/2 lg:!top-[20%] lg:!scale-[0.7] xl:!scale-[0.8]"
                />
                <Parent
                    :scale="0.2"
                    :poseNumber="3"
                    :chNumber="7"
                    class="!-top-1/2 !left-0 md:!-top-1/3 md:!left-[10%] lg:!left-[10%] lg:!top-[20%] lg:!scale-[0.7] xl:!scale-[0.8]"
                />
            </div>
        </div>
    </section>
</template>
