<script setup lang="ts">
import TheNavBar from '@/components/TheNavBar.vue';
</script>

<template>
    <header class="sticky top-0 z-40 w-full border-b bg-background">
        <TheNavBar />
    </header>
    <main class="max-w-[100vw] overflow-hidden bg-background">
        <slot />
    </main>
</template>

<style scoped></style>
