<script setup lang="ts">
import StoryChapter from '@/components/story/StoryChapter.vue';
import StoryHeader from '@/components/story/StoryHeader.vue';
import { onMounted, onUnmounted, ref } from 'vue';

const isLandscape = ref(window.innerWidth > window.innerHeight);
const isFullscreen = ref(!!document.fullscreenElement);

// Function to check if fullscreen is supported and allowed
const isFullscreenAvailable = () => {
    return document.fullscreenEnabled;
};

// Function to request fullscreen
const requestFullscreen = async () => {
    if (!isFullscreenAvailable()) {
        console.warn('Fullscreen mode is not available');
        return;
    }

    try {
        // This will trigger the browser's native permission prompt if needed
        await document.documentElement.requestFullscreen();
    } catch (err) {
        console.error(`Fullscreen request failed: ${err instanceof Error ? err.message : 'Unknown error'}`);
    }
};

// Function to handle orientation change
const handleOrientationChange = () => {
    isLandscape.value = window.innerWidth > window.innerHeight;
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

    <div
        v-else-if="!isFullscreen && isFullscreenAvailable()"
        class="fixed inset-0 flex items-center justify-center bg-black p-4 text-center text-white"
    >
        <div class="space-y-4">
            <h2 class="text-xl font-bold">Fullscreen Mode Required</h2>
            <p>This story requires fullscreen mode. Your browser will ask for permission.</p>
            <p class="text-sm text-gray-400">Note: You can exit fullscreen at any time by pressing ESC.</p>
            <button
                @click="requestFullscreen"
                class="rounded-lg bg-blue-600 px-6 py-2 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >
                Continue to Story
            </button>
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

/* Add some basic button hover states */
button:active {
    transform: scale(0.98);
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
