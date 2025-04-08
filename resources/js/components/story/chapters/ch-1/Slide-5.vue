<script setup lang="ts">
import InsightBox from '@/components/story/feedback/InsightBox.vue';

const bg = '#006565';
</script>

<template>
    <section :data-background-color="bg" data-auto-animate class="h-full py-16">
        <div class="flex h-full w-full flex-col">
            <InsightBox title="Responsibilities">
                <p>
                    As a coach, you are <span class="font-bold">the point of reference</span> for your team, which entails responsibilities towards
                    your club, your players, their parents, and your football league.
                </p>
                <p>
                    The squad call-up is a concrete example of this responsibility. You must make decisions that will have a
                    <span class="font-bold">direct impact</span> on your squad, the group dynamic, and the progress of each player.
                </p>
            </InsightBox>
        </div>
    </section>
</template>
