<script setup lang="ts">
import { storyStore } from '@/stores/storyStore';
import Reveal from 'reveal.js';
import { onMounted, ref } from 'vue';
import '/node_modules/reveal.js/dist/reveal.css';
const deck = ref<any>(null);

onMounted(() => {
    storyStore.initializeSlides();

    deck.value = new Reveal({
        plugins: [],
        progress: false,
    });
    deck.value.initialize({ width: '100%', height: '100%' });
    deck.value.on('slidechanged', (event: any) => {
        storyStore.updateCurrentSlideIndex(event.indexh);
    });
});
</script>

<template>
    <div class="reveal">
        <div class="slides h-screen w-screen">
            <component v-for="slide in storyStore.slides" :key="slide.path" :is="slide.component" />
        </div>
    </div>
</template>
