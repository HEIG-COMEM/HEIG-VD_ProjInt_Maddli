<script setup lang="ts">
import { storyStore } from '@/stores/storyStore';
import Reveal from 'reveal.js';
import { onMounted, ref } from 'vue';
import '/node_modules/reveal.js/dist/reveal.css';
// import '/node_modules/reveal.js/dist/theme/white.css'; TODO : to remove
const deck = ref<any>(null);

onMounted(() => {
    storyStore.initializeSlides();

    deck.value = new Reveal({
        plugins: [],
    });
    deck.value.initialize().then(() => {
        const progressElement = document.querySelector('.reveal .progress');
        if (progressElement) {
            (progressElement as HTMLElement).style.color = '#2a76dd';
        }
    });
});
</script>

<template>
    <div class="reveal">
        <div class="slides">
            <section v-for="slide in storyStore.slides" :key="slide.path">
                <component :is="slide.component" />
            </section>
        </div>
    </div>
</template>
