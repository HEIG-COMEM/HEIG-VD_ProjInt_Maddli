<script setup lang="ts">
import { P } from '@/components/typography/texts';
import { Button } from '@/components/ui/button';
import { LucideIcon } from 'lucide-vue-next';

interface Feature {
    icon: LucideIcon;
    title: string;
    description: string;
}

defineProps<{
    features: Feature[];
    title: string;
    buttonText: string;
    buttonLink: string;
    imageSrc: string;
}>();
</script>

<template>
    <div
        class="flex flex-col-reverse items-center justify-center gap-8 rounded-lg bg-secondary/30 p-4 text-secondary-foreground shadow-lg sm:gap-16 sm:p-8 lg:flex-row"
    >
        <div class="flex w-full flex-col items-start gap-8 lg:w-1/2">
            <P class="text-left text-xl font-bold">{{ title }}</P>
            <div class="flex flex-col gap-4">
                <div v-for="(feature, index) in features" :key="index" class="flex flex-row items-center gap-4">
                    <component :is="feature.icon" class="h-8 min-w-8 text-accent sm:h-10 sm:min-w-10" />
                    <div class="text-left">
                        <P class="font-bold">{{ feature.title }}</P>
                        <P class="!mt-0">{{ feature.description }}</P>
                    </div>
                </div>
            </div>
            <a :href="buttonLink" class="w-full sm:w-fit">
                <Button size="lg" class="w-full bg-accent text-accent-foreground hover:text-primary-foreground">
                    {{ buttonText }}
                </Button>
            </a>
        </div>
        <img class="h-full w-full rounded-lg object-cover lg:w-1/2" :src="imageSrc" />
    </div>
</template>
