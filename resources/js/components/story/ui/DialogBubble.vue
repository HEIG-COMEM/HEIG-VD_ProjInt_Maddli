<script setup lang="ts">
defineProps<{
    text: string;
    position?: {
        top?: string;
        left?: string;
    };
}>();
</script>

<template>
    <div class="relative inline-block bg-green-500" :style="position">
        <div class="relative mr-4 inline-block rounded-3xl border-2 border-black bg-red-500 p-6 shadow-lg">
            <!-- Text content with comfortable reading space -->
            <p class="text-xl leading-relaxed text-black">
                {{ text }}
            </p>

            <!-- Tail/pointer of the bubble -->
            <div class="absolute -left-2 top-10 h-4 w-4 rotate-45 border-b-2 border-l-2 border-black bg-red-500"></div>
        </div>
    </div>
</template>

<style scoped></style>
