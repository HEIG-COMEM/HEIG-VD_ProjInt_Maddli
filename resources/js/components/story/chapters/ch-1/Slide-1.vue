<script setup lang="ts">
import Caption from '@/components/story/ui/Caption.vue';

const bg = '/assets/story/bg/1.png';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="h-full">
        <div class="flex h-full w-full flex-col items-end justify-end">
            <Caption class="!static">One day before the game.</Caption>
        </div>
    </section>
</template>
