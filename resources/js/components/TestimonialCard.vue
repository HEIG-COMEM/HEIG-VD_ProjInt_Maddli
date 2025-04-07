<script setup lang="ts">
import { Muted, P } from '@/components/typography/texts';
import { Star } from 'lucide-vue-next';
import { computed } from 'vue';

const props = defineProps<{
    profileImgUrl: string;
    name: string;
    title: string;
    rating: number;
    description: string;
}>();

const ratings = computed(() => {
    return Array.from({ length: 5 }, (_, i) => (i < props.rating ? i + 1 : null));
});
</script>

<template>
    <div
        class="flex aspect-video w-full flex-col justify-between gap-4 rounded-lg bg-secondary/30 p-6 text-left text-secondary-foreground shadow-lg sm:w-1/4"
    >
        <div class="flex flex-row items-center gap-4">
            <img :src="profileImgUrl" class="h-12 w-12 rounded-full object-cover" />
            <div>
                <P class="text-xl font-bold">{{ name }}</P>
                <Muted>{{ title }}</Muted>
            </div>
        </div>
        <div class="flex flex-row gap-1">
            <Star v-for="rate in ratings" :key="rate" class="h-4 w-4 text-[#FFB700]" stroke-width="2" :fill="rate ? 'currentColor' : 'none'" />
        </div>
        <P class="text-lg">{{ description }}</P>
    </div>
</template>

<style scoped></style>
