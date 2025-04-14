<script setup lang="ts">
import InsightBox from '@/components/story/feedback/InsightBox.vue';

const bg = '#006565';
</script>

<template>
    <section :data-background-color="bg" data-auto-animate class="h-full py-12">
        <div class="flex h-full w-full flex-col">
            <InsightBox title="Unexpected situation">
                <p>
                    The unexpected is an integral part of being a coach, it's essential to be ready to
                    <span class="font-bold">react quickly and adapt</span> to unexpected situations.
                </p>
                <p>
                    Whether it's an injury, a change in weather conditions, a last-minute absence, or even forgetting equipment, your ability to
                    <span class="font-bold">find solutions</span> on the spot is important for maintaining the continuity and balance of your team.
                </p>
            </InsightBox>
        </div>
    </section>
</template>
