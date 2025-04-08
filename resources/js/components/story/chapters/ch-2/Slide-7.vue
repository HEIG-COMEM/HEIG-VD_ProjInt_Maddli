<script setup lang="ts">
import InsightBox from '@/components/story/feedback/InsightBox.vue';

const bg = '#006565';
</script>

<template>
    <section :data-background-color="bg" data-auto-animate class="h-full py-16">
        <div class="flex h-full w-full flex-col">
            <InsightBox title="Group management">
                <p>
                    Your squad is made up of players with diverse backgrounds, expectations, and behaviors. Your role is to create a
                    <span class="font-bold">balanced environment</span> where everyone finds their place and
                    <span class="font-bold">progresses together</span>.
                </p>
                <p>
                    Effective team management requires establishing <span class="font-bold">clear rules</span>, maintaining focus, and the ability to
                    refocus when necessary.
                </p>
                <p>
                    The <span class="font-bold">warm-up</span> perfectly illustrates this challenge: a well-established framework from the start
                    promotes concentration and mentally prepares the team before entering the match.
                </p>
            </InsightBox>
        </div>
    </section>
</template>
