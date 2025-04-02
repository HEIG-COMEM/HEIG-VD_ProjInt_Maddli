<script setup lang="ts">
import { storyStore } from '@/stores/storyStore';
import { computed } from 'vue';

const props = defineProps<{
    type: 'intro' | 'outro';
}>();

const isIntro = computed(() => props.type === 'intro');
const duration = computed(() => (isIntro.value ? storyStore.getDuration() : ''));
</script>

<template>
    <div class="flex min-h-screen flex-col items-start justify-center text-white">
        <!-- Title section with max width -->
        <h1 class="mb-8 max-w-sm text-left text-6xl font-bold">Hello Coach Simulation</h1>

        <!-- Dynamic content based on type -->
        <div class="mb-6 text-left text-3xl">
            <template v-if="isIntro">
                How to become a coach?
                <div class="mt-4 flex items-center text-xl" v-if="duration">
                    <span class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                    Duration: {{ duration }}
                </div>
            </template>
            <template v-else> Great job, Coach! </template>
        </div>
    </div>
</template>

<style scoped></style>
