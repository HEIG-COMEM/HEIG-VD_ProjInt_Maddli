<script setup lang="ts">
import { createSwapy } from 'swapy';
import { onMounted, ref } from 'vue';

const isButtonDisabled = ref(false);
const validateOrder = ref(() => {});
const isContainerDisabled = ref(false);

onMounted(() => {
    const container = document.querySelector('.container') as HTMLElement;
    const swapy = createSwapy(container, {
        animation: 'spring',
        dragAxis: 'y',
    });

    swapy.onBeforeSwap((event) => {
        console.log('beforeSwap', event);
        return true;
    });

    swapy.onSwapStart((event) => {
        console.log('start', event);
    });

    swapy.onSwap((event) => {
        console.log('swap', event);
    });

    swapy.onSwapEnd((event) => {
        console.log('swap end:', event);
    });

    validateOrder.value = () => {
        isButtonDisabled.value = true;
        isContainerDisabled.value = true;
        swapy.enable(false);
    };
});
</script>

<template>
    <section>
        <h1>Chapter 1 - Slide 4</h1>
        <div :class="['container mx-auto max-w-[600px]', { 'disabled-container': isContainerDisabled }]">
            <div class="my-2 min-h-[60px] rounded border border-gray-300 bg-gray-50 p-2" data-swapy-slot="a">
                <div
                    class="flex cursor-grab items-center rounded border border-gray-200 bg-white p-3 active:cursor-grabbing"
                    data-swapy-item="a"
                    data-swapy-handle
                >
                    <div>
                        Choice A <br />
                        lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Quisquam, quos.
                    </div>
                </div>
            </div>
            <div class="my-2 min-h-[60px] rounded border border-gray-300 bg-gray-50 p-2" data-swapy-slot="b">
                <div
                    class="flex cursor-grab items-center rounded border border-gray-200 bg-white p-3 active:cursor-grabbing"
                    data-swapy-item="b"
                    data-swapy-handle
                >
                    <div>
                        Choice B <br />
                        lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Quisquam, quos.
                    </div>
                </div>
            </div>
            <div class="my-2 min-h-[60px] rounded border border-gray-300 bg-gray-50 p-2" data-swapy-slot="c">
                <div
                    class="flex cursor-grab items-center rounded border border-gray-200 bg-white p-3 active:cursor-grabbing"
                    data-swapy-item="c"
                    data-swapy-handle
                >
                    <div>
                        Choice C <br />
                        lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Quisquam, quos.
                    </div>
                </div>
            </div>
            <div class="my-2 min-h-[60px] rounded border border-gray-300 bg-gray-50 p-2" data-swapy-slot="d">
                <div
                    class="flex cursor-grab items-center rounded border border-gray-200 bg-white p-3 active:cursor-grabbing"
                    data-swapy-item="d"
                    data-swapy-handle
                >
                    <div>
                        Choice D <br />
                        lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Quisquam, quos.
                    </div>
                </div>
            </div>
        </div>
        <button
            :disabled="isButtonDisabled"
            @click="validateOrder"
            class="mt-4 rounded bg-blue-500 px-4 py-2 font-bold text-white disabled:bg-gray-500"
        >
            Validate
        </button>
    </section>
</template>

<style>
[data-swapy-dragging='true'] {
    z-index: 10;
    box-shadow:
        0 4px 6px -1px rgb(0 0 0 / 0.1),
        0 2px 4px -2px rgb(0 0 0 / 0.1);
}

.disabled-container {
    opacity: 0.5;
    pointer-events: none;
}
</style>
