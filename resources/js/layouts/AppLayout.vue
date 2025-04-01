<script setup lang="ts">
import { Toaster } from '@/components/ui/sonner';
import { useOnboarding } from '@/composables/useOnboarding';
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import type { BreadcrumbItemType } from '@/types';
import { onMounted } from 'vue';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const { startOnboarding } = useOnboarding();

onMounted(() => {
    startOnboarding();
});
</script>

<template>
    <Toaster position="top-center" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <slot />
    </AppLayout>
</template>
