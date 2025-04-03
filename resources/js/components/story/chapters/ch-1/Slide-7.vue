<script setup lang="ts">
import TheCoach from '@/components/story/characters/TheCoach.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/1.png';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="h-full">
        <div class="flex h-full w-full flex-row items-center justify-end">
            <TheCoach :scale="1.2" :poseNumber="4" :chNumber="1" class="xl:!-bottom-2/5 !-bottom-[60%] !left-1/4" />
            <DialogBubble class="!left-1/3 !top-[15%] !max-w-xs xl:!left-[28%]" text="And you send a message to your players in the group chat." />
            <!-- Placeholder with SVG -->
            <div class="mr-20 bg-gray-200 xl:mr-40 xl:h-[600px] xl:w-[300px]"></div>
        </div>
    </section>
</template>
