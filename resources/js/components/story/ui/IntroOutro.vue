<script setup lang="ts">
import { storyStore } from '@/stores/storyStore';
import { Timer } from 'lucide-vue-next';
import { computed } from 'vue';

const props = defineProps<{
    type: 'intro' | 'outro';
}>();

const isIntro = computed(() => props.type === 'intro');
const duration = computed(() => (isIntro.value ? storyStore.getDuration() : ''));
</script>

<template>
    <div class="flex flex-col items-start justify-center gap-8 text-white">
        <h1 class="font-baloo max-w-sm text-left text-6xl font-bold">Hello Coach Simulation</h1>
        <div class="font-baloo text-left text-3xl">
            <template v-if="isIntro">
                How to become a coach?
                <div class="mt-4 flex items-center text-xl" v-if="duration">
                    <Timer class="mr-2" />
                    Duration: {{ duration }}
                </div>
            </template>
            <template v-else> Great job, Coach! </template>
        </div>
    </div>
</template>

<style scoped></style>
