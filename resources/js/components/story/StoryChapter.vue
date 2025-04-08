<script setup lang="ts">
import { storyUtils } from '@/stores/storyUtils';
import Reveal from 'reveal.js';
import { onMounted, ref } from 'vue';
import '/node_modules/reveal.js/dist/reveal.css';

const deck = ref<any>(null); // Reactive reference to hold the Reveal.js instance

onMounted(() => {
    storyUtils.initializeSlides(); // Initialize slides in the storyUtils

    deck.value = new Reveal({
        plugins: [], // No plugins are used in this Reveal.js instance
        progress: false, // Disabling progress bar in Reveal.js (using our own progress bar StoryProgress.vue)
    });
    deck.value.initialize({ width: '100%', height: '100%' }); // Initialize Reveal.js with full width and height
    deck.value.on('slidechanged', (event: any) => {
        storyUtils.updateCurrentSlideIndex(event.indexh); // Update current slide index in storyUtils when slide changes
    });
});
</script>

<template>
    <div class="reveal">
        <div class="slides h-screen w-screen">
            <!-- Dynamically render components for each slide in storyUtils -->
            <component v-for="slide in storyUtils.slides" :key="slide.path" :is="slide.component" />
        </div>
    </div>
</template>
