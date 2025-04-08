<script setup lang="ts">
import StoryProgress from '@/components/story/StoryProgress.vue';
import { storyUtils } from '@/stores/storyUtils';
import { computed } from 'vue';

// Get current chapter folder
const currentChapterFolder = computed(() => {
    const currentSlide = storyUtils.getCurrentSlide();
    if (!currentSlide) return 'ch-0';
    return currentSlide.path.split('/').slice(-2, -1)[0];
});

// Get chapter name using store method
const chapterName = computed(() => {
    const folders = storyUtils.getAllChaptersFolders();
    const index = folders.indexOf(currentChapterFolder.value);
    return storyUtils.getChapterName()[index];
});

// Get chapter title using store method
const chapterTitle = computed(() => {
    return storyUtils.getChapterTitle(currentChapterFolder.value);
});
</script>

<template>
    <div>
        <div class="ml-4 mr-12 flex h-[10dvh] items-center justify-between lg:!mr-16">
            <a class="flex h-full flex-col justify-center" :href="route('home')">
                <img src="/assets/icons/logo.svg" alt="Hello Coach Logo" class="h-2/3 w-auto" />
            </a>
            <div class="text-right">
                <div class="text- text-xs lg:!text-xl xl:!text-2xl">{{ chapterName }}</div>
                <div class="font-baloo text-sm font-bold uppercase md:!text-base lg:!text-2xl xl:!text-3xl">{{ chapterTitle }}</div>
            </div>
        </div>
        <StoryProgress />
    </div>
</template>
