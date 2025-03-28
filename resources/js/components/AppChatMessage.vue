<script setup lang="ts">
defineProps<{
    message: string;
    toMe?: boolean;
}>();
</script>

<template>
    <div
        :class="[
            'flex w-max max-w-[75%] flex-col gap-2 rounded-lg px-3 py-2 text-sm',
            toMe ? 'bg-muted' : 'ml-auto bg-primary text-primary-foreground',
        ]"
    >
        {{ message }}
    </div>
</template>

<style scoped></style>
