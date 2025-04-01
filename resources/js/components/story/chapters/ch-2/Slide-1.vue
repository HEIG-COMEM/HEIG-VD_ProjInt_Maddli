<script setup lang="ts">
import { createSwapy } from 'swapy';
import { onMounted, ref } from 'vue';

const isButtonDisabled = ref(false);
const validateOrder = ref(() => {});

onMounted(() => {
    const container = document.querySelector('.container');
    const swapy = createSwapy(container as HTMLElement, {
        dragAxis: 'y',
        animation: 'none',
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
        swapy.enable(false);
    };
});
</script>

<template>
    <section>
        <h1>Chapter 2 - Slide 1</h1>
        <div class="container m-4 flex flex-col gap-4">
            <div data-swapy-slot="a" class="slot top">
                <div data-swapy-item="a">
                    <div>Answer 1</div>
                </div>
            </div>

            <div data-swapy-slot="b" class="slot">
                <div data-swapy-item="b">
                    <div>Answer 2</div>
                </div>
            </div>

            <div data-swapy-slot="c" class="slot">
                <div data-swapy-item="c">
                    <div>Answer 3</div>
                </div>
            </div>

            <div data-swapy-slot="d" class="slot bottom">
                <div data-swapy-item="d">
                    <div>Answer 4</div>
                </div>
            </div>
        </div>
        <button
            :disabled="isButtonDisabled"
            @click="validateOrder"
            class="mt-4 rounded bg-blue-500 px-4 py-2 font-bold text-white disabled:bg-gray-500"
        >
            Validate Order
        </button>
    </section>
</template>

<style scoped>
.container * {
    border: 1px solid red;
}
</style>
