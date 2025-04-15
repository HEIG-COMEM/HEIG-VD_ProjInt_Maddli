<script setup lang="ts">
import StoryChapter from '@/components/story/StoryChapter.vue';
import StoryHeader from '@/components/story/StoryHeader.vue';
import { onMounted, onUnmounted, ref } from 'vue';

const isLandscape = ref(window.innerWidth > window.innerHeight);
const isFullscreen = ref(!!document.fullscreenElement);

// Function to handle orientation change
const handleOrientationChange = () => {
    isLandscape.value = window.innerWidth > window.innerHeight;

    // If we're in landscape, request fullscreen
    if (isLandscape.value && !document.fullscreenElement) {
        document.documentElement.requestFullscreen().catch((err) => {
            console.error(`Error attempting to enable fullscreen: ${err.message}`);
        });
    }
};

// Function to handle fullscreen change
const handleFullscreenChange = () => {
    isFullscreen.value = !!document.fullscreenElement;
};

// Set up event listeners
onMounted(() => {
    window.addEventListener('resize', handleOrientationChange);
    document.addEventListener('fullscreenchange', handleFullscreenChange);

    // Initial check
    handleOrientationChange();
});

// Clean up event listeners
onUnmounted(() => {
    window.removeEventListener('resize', handleOrientationChange);
    document.removeEventListener('fullscreenchange', handleFullscreenChange);
});
</script>

<template>
    <div v-if="!isLandscape" class="fixed inset-0 flex items-center justify-center bg-black p-4 text-center text-white">
        <div>
            <h2 class="mb-2 text-xl font-bold">Please rotate your device</h2>
            <p>This experience requires landscape orientation for the best viewing experience.</p>
        </div>
    </div>

    <div v-else class="relative h-screen max-h-screen">
        <StoryHeader class="absolute left-0 top-0 z-10 -mt-[10dvh] max-h-[10dvh] w-screen" />
        <StoryChapter class="mt-[10dvh] h-[90dvh] max-h-[90dvh]" />
    </div>
</template>

<style scoped>
/* Hide all browser UI when in fullscreen */
:fullscreen {
    background-color: black;
}

@media screen and (orientation: portrait) {
    .rotate-message {
        display: flex;
    }
}

@media screen and (orientation: landscape) {
    .rotate-message {
        display: none;
    }
}
</style>
