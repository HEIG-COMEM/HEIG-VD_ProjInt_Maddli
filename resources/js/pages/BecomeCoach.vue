<script setup lang="ts">
import Story from '@/components/story/Story.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Become a coach"></Head>
    <div class="h-[100dvh] w-screen">
        <Story />
    </div>
</template>

<style scoped>
:deep(.reveal) {
    width: 100vw;
    height: 100%;
}
</style>
