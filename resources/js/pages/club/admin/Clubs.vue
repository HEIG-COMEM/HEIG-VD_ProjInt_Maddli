<script setup lang="ts">
import AppPagination from '@/components/AppPagination.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import { defineProps, ref } from 'vue';

const props = defineProps<{
    data: any;
}>();

console.log(props.data);

const clubs = ref(props.data.data);
const path = ref(props.data.path);

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Home',
        href: '/club',
    },
    {
        title: 'Clubs',
        href: '/club/admin/clubs',
    },
];

const handlePageChange = (page: number) => {
    const url = `${path.value}?page=${page}`;
    router.visit(url, { preserveScroll: false });
};
</script>

<template>
    <Head title="Home" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border"></div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border"></div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border"></div>
            </div>
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <div class="flex flex-col items-center justify-center gap-2 p-4">
                    {{ clubs }}
                    <AppPagination
                        :items-per-page="data.per_page"
                        :total="data.total"
                        :sibling-count="3"
                        :show-edges="true"
                        :default-page="data.current_page"
                        @update:page="handlePageChange($event)"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
