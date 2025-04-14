<script setup lang="ts">
import Caption from '@/components/story/ui/Caption.vue';

const bg = '/assets/story/bg/6-1.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="h-full">
        <div class="absolute inset-0 -z-10 h-full w-full scale-150 bg-black opacity-30"></div>
        <div class="absolute bottom-[10%] right-[5%] flex flex-col items-end">
            <Caption class="!static">
                <p>The girls left to get changed.</p>
            </Caption>
        </div>
    </section>
</template>
