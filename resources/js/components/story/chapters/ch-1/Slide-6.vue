<script setup lang="ts">
import TheCoach from '@/components/story/characters/TheCoach.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/1.png';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="h-full">
        <div class="flex h-full w-full flex-col items-center justify-center">
            <TheCoach :scale="1.2" :poseNumber="3" :chNumber="1" class="xl:!-bottom-2/5 !-bottom-[60%] !left-1/4" />
            <DialogBubble
                class="!left-1/3 !top-[15%] !max-w-xs xl:!left-[28%]"
                text="Once your choices are made, you will send the list to the match official for validation before the game."
            />
        </div>
    </section>
</template>
