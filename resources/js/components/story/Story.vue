<script setup lang="ts">
import StoryChapter from '@/components/story/StoryChapter.vue';
import StoryHeader from '@/components/story/StoryHeader.vue';
import { onMounted, onUnmounted, ref } from 'vue';

const isLandscape = ref(window.innerWidth > window.innerHeight);
const isFullscreen = ref(!!document.fullscreenElement);
const isMobile = ref(false);
const hasInteracted = ref(false);

// Function to detect if device is mobile
const checkIfMobile = () => {
    isMobile.value = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
};

// Function to request fullscreen
const requestFullscreen = async () => {
    try {
        // Only proceed if we have user interaction
        if (!hasInteracted.value) {
            hasInteracted.value = true;
            return;
        }

        await document.documentElement.requestFullscreen();
        isFullscreen.value = true;
    } catch (err: any) {
        console.error(`Error attempting to enable fullscreen: ${err.message}`);
    }
};

// Function to handle orientation change
const handleOrientationChange = () => {
    isLandscape.value = window.innerWidth > window.innerHeight;

    // Only auto-request fullscreen on desktop
    if (!isMobile.value && isLandscape.value && !document.fullscreenElement) {
        requestFullscreen();
    }
};

// Function to handle fullscreen change
const handleFullscreenChange = () => {
    isFullscreen.value = !!document.fullscreenElement;
};

// Set up event listeners
onMounted(() => {
    checkIfMobile();
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

    <div v-else-if="isMobile && !isFullscreen" class="fixed inset-0 flex items-center justify-center bg-black p-4 text-center text-white">
        <div class="space-y-4">
            <h2 class="mb-2 text-xl font-bold">Enter Fullscreen Mode</h2>
            <p>For the best experience, please enter fullscreen mode.</p>
            <button
                @click="requestFullscreen"
                class="rounded-lg bg-blue-600 px-6 py-2 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 active:bg-blue-800"
            >
                {{ !hasInteracted ? 'Start Experience' : 'Enter Fullscreen' }}
            </button>
            <p v-if="hasInteracted" class="text-sm text-gray-400">Tap the button again to enter fullscreen mode</p>
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
