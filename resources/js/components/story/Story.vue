<script setup lang="ts">
import StoryChapter from './StoryChapter.vue';
import StoryHeader from './StoryHeader.vue';
</script>

<template>
    <div class="relative h-[92dvh] max-h-[92dvh]">
        <StoryHeader class="absolute left-0 top-0 z-10 -mt-[5dvh] max-h-[10dvh] w-screen" />
        <StoryChapter class="mt-[10dvh] h-[92dvh] max-h-[92dvh]" />
    </div>
</template>

<style scoped></style>
