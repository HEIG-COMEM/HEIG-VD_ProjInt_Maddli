<script setup lang="ts">
import { storyStore } from '../../../../stores/storyStore';
import IntroOutro from '../../ui/IntroOutro.vue';
</script>

<template>
    <section :data-background-color="storyStore.backgroundColor">
        <h1>Introduction - Slide 2</h1>
        <IntroOutro type="outro" />
    </section>
</template>
