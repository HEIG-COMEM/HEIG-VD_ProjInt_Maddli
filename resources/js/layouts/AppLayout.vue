<script setup lang="ts">
import { Toaster } from '@/components/ui/sonner';
import { useOnboarding } from '@/composables/useOnboarding';
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import type { BreadcrumbItemType } from '@/types';
import { useMediaQuery } from '@vueuse/core';
import { onMounted } from 'vue';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
const isMobile = useMediaQuery('(max-width: 768px)');
const { startOnboarding } = useOnboarding(isMobile.value);

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
