<script setup lang="ts">
defineProps<{
    items: HTMLElement[];
}>();
</script>

<template>
    <ul class="my-6 ml-6 list-disc [&>li]:mt-2">
        <li v-for="(item, index) in items" :key="index">
            <slot :item="item"></slot>
        </li>
    </ul>
</template>
