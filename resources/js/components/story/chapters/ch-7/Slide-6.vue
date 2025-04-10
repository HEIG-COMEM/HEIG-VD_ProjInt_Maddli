<script setup lang="ts">
import InsightBox from '@/components/story/feedback/InsightBox.vue';

const bg = '#006565';
</script>

<template>
    <section data-auto-animate :data-background-color="bg" class="h-full">
        <div class="flex h-full flex-col">
            <InsightBox title="Community Leader">
                <p>
                    You play a key role in your club and your community. Parents rely on you and see you as a vital link between them and their
                    children. The feedback you provide is invaluable, and your work is both appreciated and highly valued.
                </p>
                <p>
                    In addition, you have the opportunity to share and transmit your <span class="font-bold">passion</span> for football. This passion
                    inspires not only your players, but also the parents, which can strengthen commitment within the club.
                </p>
            </InsightBox>
        </div>
    </section>
</template>
