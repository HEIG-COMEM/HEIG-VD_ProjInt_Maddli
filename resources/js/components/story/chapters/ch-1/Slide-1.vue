<script setup lang="ts">
import DialogBubble from '../../ui/DialogBubble.vue';
</script>

<template>
    <section data-background-color="aquamarine" class="relative">
        <h1>Chapter 1 - Slide 1</h1>
        <DialogBubble
            text="Hello world ! Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos."
            :position="{ top: 0, left: 25, unit: 'viewport' }"
        />
    </section>
</template>
