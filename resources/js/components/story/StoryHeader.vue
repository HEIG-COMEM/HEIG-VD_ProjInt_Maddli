<script setup lang="ts">
import StoryProgress from '@/components/story/StoryProgress.vue';
</script>

<template>
    <div>
        <div class="flex h-[10dvh] items-center justify-between">
            <div class="ml-4">Logo</div>
            <div class="mr-4 text-right">
                <div>Chapter N</div>
                <div>ChapterTitle</div>
            </div>
        </div>
        <StoryProgress />
    </div>
</template>
