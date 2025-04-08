<script setup lang="ts">
import Caption from '@/components/story/ui/Caption.vue';

const bg = '/assets/story/bg/3.png';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="h-full">
        <div class="absolute bottom-[10%] right-[5%] flex flex-col items-end">
            <Caption class="!static">
                <p class="text-left">The coach is watching the team's practice</p>
            </Caption>
        </div>
    </section>
</template>
