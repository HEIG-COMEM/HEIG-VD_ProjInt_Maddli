<script setup lang="ts">
import IntroOutro from '@/components/story/ui/IntroOutro.vue';
import { storyStore } from '@/stores/storyStore';
</script>

<template>
    <section :data-background-color="storyStore.backgroundColor">
        <h1>Introduction - Slide 2</h1>
        <IntroOutro type="outro" />
    </section>
</template>
