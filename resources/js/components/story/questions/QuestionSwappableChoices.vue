<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { storyStore } from '@/stores/storyStore';
import { GripHorizontal } from 'lucide-vue-next';
import { createSwapy } from 'swapy';
import { onMounted, ref } from 'vue';

const props = defineProps<{
    question: string;
    choices: string[];
}>();

const isButtonDisabled = ref(false);
const validateOrder = ref(() => {});
const isContainerDisabled = ref(false);

onMounted(() => {
    const container = document.querySelector('.container') as HTMLElement;

    // Initializing swapy
    const swapy = createSwapy(container, {
        animation: 'spring',
        dragAxis: 'y',
    });

    // Function to validate the order of choices
    validateOrder.value = () => {
        isButtonDisabled.value = true; // Disable the validate button
        isContainerDisabled.value = true; // Disable the container for further interactions
        swapy.enable(false); // Disable swapy interactions

        // Collecting the ordered choices and storing them
        const choices = Array.from(container.querySelectorAll('[data-swapy-item]')).map((item) => item.textContent?.trim() || '');
        choices.forEach((choice) => {
            storyStore.addChoice(choice); // Adding each choice to the storyStore
        });
    };
});
</script>

<template>
    <div class="flex flex-col items-center justify-center gap-4 p-4">
        <!-- Question Box -->
        <div class="w-full max-w-3xl rounded-3xl border-2 border-gray-200 bg-white p-8 text-center shadow-lg">
            <p class="mb-8 text-2xl font-bold text-black">{{ props.question }}</p>

            <!-- Swappable Choices Container -->
            <div :class="['container mx-auto max-w-[600px]', { 'disabled-container': isContainerDisabled }]">
                <div
                    v-for="(choice, index) in props.choices"
                    :key="index"
                    class="my-2 min-h-[60px] rounded-2xl border border-gray-300 bg-gray-50 p-2"
                    :data-swapy-slot="index"
                >
                    <div
                        class="flex cursor-grab items-center justify-between rounded-xl border border-gray-200 bg-white p-4 text-lg font-medium hover:border-blue-300 hover:bg-blue-50 active:cursor-grabbing"
                        :data-swapy-item="index"
                        data-swapy-handle
                    >
                        {{ choice }}
                        <GripHorizontal class="ml-auto h-6 w-6" />
                    </div>
                </div>
            </div>

            <!-- Validate Button -->
            <Button :disabled="isButtonDisabled" @click="validateOrder"> Validate </Button>
        </div>
    </div>
</template>

<style>
.disabled-container {
    opacity: 0.5;
    pointer-events: none;
}
</style>
