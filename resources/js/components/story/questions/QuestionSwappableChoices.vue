<script setup lang="ts">
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
    <div class="absolute inset-0 -z-10 h-full w-full scale-150 bg-black opacity-50"></div>
    <div class="flex h-full items-center justify-center">
        <!-- Question Box -->
        <div
            class="flex max-w-3xl flex-col items-center justify-center gap-1 rounded-xl border-2 border-gray-200 bg-white p-2 text-center shadow-lg md:rounded-2xl md:p-6 lg:gap-4 lg:rounded-3xl lg:p-8"
        >
            <p class="text-sm font-bold text-black md:text-lg lg:text-2xl">{{ props.question }}</p>

            <!-- Swappable Choices Container -->
            <div :class="['container flex flex-col gap-2', { 'disabled-container': isContainerDisabled }]">
                <div
                    v-for="(choice, index) in props.choices"
                    :key="index"
                    class="rounded-lg border border-gray-300 bg-gray-50 p-1 md:rounded-xl md:p-3 lg:rounded-2xl lg:p-4"
                    :data-swapy-slot="index"
                >
                    <div
                        class="flex cursor-grab items-center justify-between border border-gray-200 bg-white p-1 text-xs font-medium hover:border-blue-300 hover:bg-blue-50 active:cursor-grabbing md:rounded-xl md:p-3 lg:rounded-2xl lg:p-4 lg:text-lg"
                        :data-swapy-item="index"
                        data-swapy-handle
                    >
                        {{ choice }}
                        <GripHorizontal class="h-3 w-3 md:h-5 md:w-5 lg:h-6 lg:w-6" />
                    </div>
                </div>
            </div>

            <!-- Validate Button -->
            <button
                :disabled="isButtonDisabled"
                @click="validateOrder"
                :class="[
                    'rounded-lg border-2 border-gray-200 bg-black px-2 py-1 text-center font-medium text-white transition-all duration-200',
                    'lg:text-md text-xs xl:text-lg',
                    { 'cursor-not-allowed opacity-50': isButtonDisabled, 'hover:border-blue-300 hover:bg-blue-50': !isButtonDisabled },
                ]"
            >
                Validate
            </button>
        </div>
    </div>
</template>

<style>
.disabled-container {
    opacity: 0.5;
    pointer-events: none;
}
</style>
