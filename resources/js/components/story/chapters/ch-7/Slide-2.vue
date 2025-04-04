<script setup lang="ts">
import Parent from '@/components/story/characters/Parent.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';
</script>

<template>
    <section data-auto-animate data-background-image="/assets/story/bg/8.png" class="h-full">
        <div class="relative flex h-full w-full flex-row justify-around">
            <div class="relative w-1/2"></div>
            <div class="relative w-1/2">
                <DialogBubble text="Well done coach ! It was a great game." tail-position="right" class="!-left-[40%] !top-[10%]" />
                <Parent :scale="0.2" :poseNumber="2" :chNumber="7" class="!left-3/4 !top-1/4" />
                <Parent :scale="0.2" :poseNumber="1" :chNumber="7" class="!left-1/4 !top-1/4" />
            </div>
        </div>
    </section>
</template>
