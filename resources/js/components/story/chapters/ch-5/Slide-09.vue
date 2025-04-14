<script setup lang="ts">
import InsightBox from '@/components/story/feedback/InsightBox.vue';

const bg = '#006565';
</script>

<template>
    <section :data-background-color="bg" data-auto-animate class="h-full py-12">
        <div class="flex h-full w-full flex-col">
            <InsightBox title="Conflict management">
                <p>
                    There will be times when your choices are <span class="font-bold">questioned</span>, whether by parents, players, or other
                    stakeholders.
                </p>
                <p>
                    Conflicts can also arise between your players, with the opponent, the referee, or even the fans. In these moments, it's essential
                    that you handle these situations <span class="font-bold">constructively</span>.
                </p>
                <p>As a coach, you must know how to channel tensions, calm tempers, and sometimes take responsibility for your decisions.</p>
            </InsightBox>
        </div>
    </section>
</template>
