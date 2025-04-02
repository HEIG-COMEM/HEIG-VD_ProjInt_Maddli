<script setup lang="ts">
import StoryChapter from './StoryChapter.vue';
import StoryHeader from './StoryHeader.vue';
</script>

<template>
    <div class="relative h-screen max-h-screen">
        <StoryHeader class="absolute left-0 top-0 z-10 -mt-[10dvh] max-h-[10dvh] w-screen" />
        <StoryChapter class="mt-[10dvh] h-[90dvh] max-h-[90dvh]" />
    </div>
</template>

<style scoped></style>
