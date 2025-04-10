<script setup lang="ts">
import { storyUtils } from '@/stores/storyUtils';
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
            storyUtils.addChoice(choice); // Adding each choice to the storyUtils
        });
    };
});
</script>

<template>
    <div class="absolute inset-0 -z-10 h-full w-full scale-150 bg-black opacity-50"></div>
    <div class="flex h-full items-center justify-center">
        <!-- Question Box -->
        <div
            class="mt-2 flex max-w-3xl flex-col items-center justify-center gap-1 rounded-xl border-2 border-gray-200 bg-white p-2 text-center shadow-lg md:rounded-2xl lg:gap-2 lg:rounded-3xl lg:p-4 xl:gap-4"
        >
            <p class="md:text-md text-sm font-bold text-black lg:text-xl xl:text-2xl">{{ props.question }}</p>

            <!-- Swappable Choices Container -->
            <div :class="['container flex flex-col gap-2', { 'disabled-container': isContainerDisabled }]">
                <div
                    v-for="(choice, index) in props.choices"
                    :key="index"
                    class="rounded-lg border border-gray-300 bg-gray-50 p-1 md:rounded-xl lg:rounded-2xl lg:p-2 xl:rounded-3xl xl:p-3"
                    :data-swapy-slot="index"
                >
                    <div
                        class="flex cursor-grab items-center justify-between rounded-md border border-gray-200 bg-white p-1 text-xs font-medium hover:border-blue-300 hover:bg-blue-50 active:cursor-grabbing md:rounded-lg md:px-2 lg:rounded-2xl lg:p-3 lg:text-lg xl:text-xl"
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
                    'text-xs lg:px-3 lg:text-lg xl:text-xl',
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
