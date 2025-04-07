<script setup lang="ts">
import StoryProgress from '@/components/story/StoryProgress.vue';
import { storyStore } from '@/stores/storyStore';
import { computed } from 'vue';

// Get current chapter folder
const currentChapterFolder = computed(() => {
    const currentSlide = storyStore.getCurrentSlide();
    if (!currentSlide) return 'ch-0';
    return currentSlide.path.split('/').slice(-2, -1)[0];
});

// Get chapter name using store method
const chapterName = computed(() => {
    const folders = storyStore.getAllChaptersFolders();
    const index = folders.indexOf(currentChapterFolder.value);
    return storyStore.getChapterName()[index];
});

// Get chapter title using store method
const chapterTitle = computed(() => {
    return storyStore.getChapterTitle(currentChapterFolder.value);
});
</script>

<template>
    <div>
        <div class="ml-4 mr-16 flex h-[10dvh] items-center justify-between">
            <a :href="route('home')">
                <img src="/assets/icons/logo.svg" alt="Hello Coach Logo" class="h-12 w-auto" />
            </a>
            <div class="mr-4 text-right">
                <div class="text-xl">{{ chapterName }}</div>
                <div class="font-baloo text-2xl font-bold uppercase">{{ chapterTitle }}</div>
            </div>
        </div>
        <StoryProgress />
    </div>
</template>
