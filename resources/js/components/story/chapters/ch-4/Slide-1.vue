<script setup lang="ts">
import Caption from '@/components/story/ui/Caption.vue';

const bg = '/assets/story/bg/3-1_4-1_5-1.png';
</script>

<template>
    <section :data-background-image="bg" data-auto-animate class="h-full">
        <img
            src="/assets/story/ch-4/elements/scoreboard.svg"
            alt="Scoreboard"
            class="absolute left-[32%] top-[25%] w-[35%] md:!top-[10%] xl:!left-[30%] xl:!top-[30%] xl:!w-[40%] 2xl:!top-[20%]"
        />
        <div class="absolute bottom-[10%] right-[5%] flex flex-col items-end">
            <Caption class="!static">
                <p class="text-left">It’s half time.</p>
            </Caption>
        </div>
    </section>
</template>
