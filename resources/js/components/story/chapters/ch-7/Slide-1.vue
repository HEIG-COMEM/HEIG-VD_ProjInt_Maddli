<script setup lang="ts">
import Caption from '@/components/story/ui/Caption.vue';

const bg = '/assets/story/bg/3-blurry.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="h-full">
        <div class="flex h-full flex-col items-end justify-end">
            <Caption class="!static">
                <p>Parents are waiting for their kids to finish showering after the game.</p>
            </Caption>
        </div>
    </section>
</template>
