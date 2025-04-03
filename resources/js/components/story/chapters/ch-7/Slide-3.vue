<script setup lang="ts">
import Parent from '@/components/story/characters/Parent.vue';
import TheCoach from '@/components/story/characters/TheCoach.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';
</script>

<template>
    <section data-auto-animate data-background-image="/assets/story/bg/8.png" class="h-full">
        <div class="relative flex h-full w-full flex-row justify-around">
            <div class="relative w-1/2">
                <DialogBubble
                    text="It’s a great time for you to share a moment with the parents and give a feedback."
                    tail-position="left"
                    class="!left-1/2"
                />
                <TheCoach :scale="1.2" :poseNumber="3" :chNumber="1" class="!left-1/3 !top-1/4 xl:!left-1/2" />
            </div>
            <div class="relative w-1/2">
                <Parent :scale="1.2" :poseNumber="4" :chNumber="7" class="!left-3/4 !top-1/4" />
                <Parent :scale="1.2" :poseNumber="3" :chNumber="7" class="!left-1/4 !top-1/4" />
            </div>
        </div>
    </section>
</template>
