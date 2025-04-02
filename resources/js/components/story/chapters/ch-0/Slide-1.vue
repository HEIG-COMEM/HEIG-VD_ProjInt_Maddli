<script setup lang="ts">
import { watch } from 'vue';
import { storyStore } from '../../../../stores/storyStore';
import IntroOutro from '../../ui/IntroOutro.vue';

// update the background color of the slide to BROWN when the slide is currentSlide
watch(
    () => storyStore.currentSlideIndex,
    () => {
        // log color before setting it
        // console.log(storyStore.backgroundColor);
        storyStore.setBackground('GRAY');
        // log color after setting it
        // console.log(storyStore.backgroundColor);
        // log querySelector current slide data-background-color
        // console.log(document.querySelector('section[data-background-color]')?.getAttribute('data-background-color'));
    },
);
</script>

<template>
    <section :data-background-color="storyStore.backgroundColor">
        <h1>Introduction- Slide 1</h1>
        <IntroOutro type="intro" />
    </section>
</template>
