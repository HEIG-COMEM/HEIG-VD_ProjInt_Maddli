<script setup lang="ts">
import Story from '@/components/story/Story.vue';
import WebLayout from '@/layouts/WebLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Become a coach"></Head>

    <WebLayout>
        <div class="h-[90dvh] w-screen">
            <h1>Become a coach</h1>
            <Story />
        </div>
    </WebLayout>
</template>

<style scoped>
:deep(.reveal) {
    width: 100vw;
    height: 100%;
}
</style>
