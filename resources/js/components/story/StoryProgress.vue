<script setup lang="ts">
import { storyUtils } from '@/stores/storyUtils';
import { computed } from 'vue';

const totalSlides = computed(() => storyUtils.getTotalSlides());
const currentProgress = computed(() => storyUtils.getCurrentSlideProgress());
const chapters = computed(() => storyUtils.getAllChaptersFolders());
const chaptersNames = computed(() => storyUtils.getChapterName());
const numberOfSlidesInEachChapter = computed(() => storyUtils.getNumberOfSlidesInEachChapter());
</script>

<template>
    <div class="min-w-[100dvw]flex-row relative flex gap-1">
        <div
            class="absolute left-0 top-0 h-full bg-gradient-to-r from-yellow-500/20 from-0% via-yellow-500/70 via-75% to-yellow-500/70 to-100% transition-all duration-500 ease-out"
            :style="{ width: `${currentProgress}%` }"
        ></div>
        <div
            class="absolute top-0 h-4 w-4 -translate-x-1/2 translate-y-1/2 rounded-full bg-white/50 transition-all duration-500 ease-out"
            :style="{ left: `${currentProgress}%` }"
        >
            <div class="h-2 w-2 translate-x-1/2 translate-y-1/2 rounded-full bg-white transition-all duration-500 ease-out"></div>
        </div>
        <div
            v-for="(chapter, index) in chapters"
            :key="chapter"
            :style="{ width: `${(numberOfSlidesInEachChapter?.[index] * 100) / totalSlides}%` }"
            class="truncate bg-gray-900/50 p-2 text-xs font-bold uppercase text-white"
        >
            {{ chaptersNames?.[index] }}
        </div>
    </div>
</template>

<style scoped></style>
