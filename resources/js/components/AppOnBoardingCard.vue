<script setup lang="ts">
import { Card, CardContent, CardTitle } from '@/components/ui/card';
import { Link } from '@inertiajs/vue3';
import type { LucideIcon } from 'lucide-vue-next';
import { defineProps, withDefaults } from 'vue';

interface Props {
    title: string;
    href?: string;
    icon?: LucideIcon;
}
withDefaults(defineProps<Props>(), {
    title: '',
    href: undefined,
    icon: () => ({}) as LucideIcon,
});
</script>

<template>
    <Link v-if="href" :href>
        <Card class="flex flex-col items-center justify-center bg-accent p-4 text-accent-foreground">
            <CardContent>
                <slot name="icon"></slot>
            </CardContent>
            <CardTitle>{{ title }}</CardTitle>
        </Card>
        <Card class="flex flex-col items-center justify-center bg-accent p-4 text-accent-foreground">
            <CardContent>
                <slot name="icon"></slot>
            </CardContent>
            <CardTitle>{{ title }}</CardTitle>
        </Card>
    </Link>
    <Card v-else class="flex flex-col items-center justify-center bg-accent p-4 text-accent-foreground">
        <CardContent>
            <slot name="icon"></slot>
        </CardContent>
        <CardTitle>{{ title }}</CardTitle>
    </Card>
</template>

<style scoped></style>
