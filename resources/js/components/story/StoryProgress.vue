<script setup lang="ts">
import { storyStore } from '@/stores/storyStore';
import { computed } from 'vue';

const totalSlides = computed(() => storyStore.getTotalSlides());
const currentProgress = computed(() => storyStore.getCurrentSlideProgress());
const chapters = computed(() => storyStore.getAllChaptersFolders());
const chaptersNames = computed(() => storyStore.getAllChaptersFoldersNames());
const numberOfSlidesInEachChapter = computed(() => storyStore.getNumberOfSlidesInEachChapter());
</script>

<template>
    <div class="min-w-[100dvw]flex-row relative flex gap-1">
        <div class="absolute left-0 top-0 h-full bg-blue-500/50 transition-all duration-500 ease-out" :style="{ width: `${currentProgress}%` }"></div>
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
