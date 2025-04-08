<script setup lang="ts">
import { P } from '@/components/typography/texts';
import { Button } from '@/components/ui/button';
import { router } from '@inertiajs/vue3';
import { CheckCircle, LucideIcon } from 'lucide-vue-next';
import { defineProps } from 'vue';

// Define props for the component
defineProps<{
    title: string;
    description: string;
    features: string[];
    buttonText: string;
    buttonRoute: string;
    icon: LucideIcon;
}>();
</script>

<template>
    <div class="flex w-full flex-col items-start justify-between gap-8 rounded-lg bg-secondary/30 p-6 text-left text-secondary-foreground shadow-lg">
        <div class="flex w-full flex-col items-start gap-8">
            <div class="flex flex-row items-center justify-center gap-4">
                <component :is="icon" class="h-8 w-8 text-accent" />
                <P class="!mt-0 text-xl font-bold">{{ title }}</P>
            </div>
            <P class="!mt-0 text-pretty text-base text-secondary-foreground">
                {{ description }}
            </P>
        </div>
        <div class="flex w-full flex-col items-start gap-8">
            <div class="flex flex-col gap-4">
                <div v-for="(feature, index) in features" :key="index" class="flex flex-row items-center gap-2">
                    <CheckCircle class="h-6 w-6 text-accent" />
                    <P class="!mt-0 text-base text-secondary-foreground">{{ feature }}</P>
                </div>
            </div>
            <Button @click="router.visit(route(buttonRoute))" size="lg" class="w-full bg-accent text-accent-foreground hover:text-primary-foreground">
                {{ buttonText }}
            </Button>
        </div>
    </div>
</template>

<style scoped></style>
