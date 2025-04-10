<script setup lang="ts">
import InsightBox from '@/components/story/feedback/InsightBox.vue';

const bg = '#006565';
</script>

<template>
    <section :data-background-color="bg" data-auto-animate class="h-full py-16">
        <div class="flex h-full w-full flex-col">
            <InsightBox title="Leadership">
                <p>
                    A good <span class="font-bold">leader</span> inspires, motivates, and provides clear direction to their team. Your ability to
                    unite and mobilize around a <span class="font-bold">common goal</span> makes all the difference.
                </p>
                <p>
                    The players listen to you and count on you for <span class="font-bold">guidance</span>. Your words have a direct
                    <span class="font-bold">impact</span> on their state of mind.
                </p>
                <p>
                    Half time is a key moment where your <span class="font-bold">message</span> must be both strategic and psychological: boost energy
                    if necessary, calm tempers in case of tension, and refocus the team on its strengths to tackle the second half.
                </p>
            </InsightBox>
        </div>
    </section>
</template>
