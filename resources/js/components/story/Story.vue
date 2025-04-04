<script setup lang="ts">
import StoryChapter from '@/components/story/StoryChapter.vue';
import StoryHeader from '@/components/story/StoryHeader.vue';
</script>

<template>
    <!-- TODO: REMOVE AFTER DEBUG -->
    <div class="absolute">
        <div class="fixed left-0 top-0 z-50 bg-gray-800 p-2 text-sm text-white">
            <span class="sm:hidden">Breakpoint: xs</span>
            <span class="hidden sm:inline md:hidden">Breakpoint: sm</span>
            <span class="hidden md:inline lg:hidden">Breakpoint: md</span>
            <span class="hidden lg:inline xl:hidden">Breakpoint: lg</span>
            <span class="hidden xl:inline 2xl:hidden">Breakpoint: xl</span>
            <span class="hidden 2xl:inline">Breakpoint: 2xl</span>
        </div>
    </div>
    <div class="relative h-screen max-h-screen">
        <StoryHeader class="absolute left-0 top-0 z-10 -mt-[10dvh] max-h-[10dvh] w-screen" />
        <StoryChapter class="mt-[10dvh] h-[90dvh] max-h-[90dvh]" />
    </div>
</template>

<style scoped></style>
