<script setup lang="ts">
import { storyUtils } from '@/stores/storyUtils';
import { onMounted } from 'vue';
import '/node_modules/reveal.js/dist/reveal.css';

onMounted(() => {
    storyUtils.initializeSlides();
    storyUtils.initializeDeck();
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
