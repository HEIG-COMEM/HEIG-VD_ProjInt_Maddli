<script setup lang="ts">
import AppPagination from '@/components/AppPagination.vue';
import AppUserInitialToolTip from '@/components/AppUserInitialToolTip.vue';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { ScrollArea, ScrollBar } from '@/components/ui/scroll-area';
import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import AppLayout from '@/layouts/AppLayout.vue';
import { debounce } from '@/lib/utils';
import { type BreadcrumbItem } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import { defineProps, onMounted, ref, useTemplateRef, watch } from 'vue';

const props = defineProps<{
    data: any;
    filters: any;
}>();

console.log(props.data);

const clubs = ref(props.data.data);
const path = ref(props.data.path);
const nameFilter = ref(props.filters.name || '');
const nameFilterInput = useTemplateRef('nameFilterInput');

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
    router.visit(url, { preserveScroll: true });
};

const handleNameFilterChange = () => {
    const url = `${path.value}?name=${nameFilter.value}`;
    router.visit(url, { preserveScroll: true });
};

const handleUserClick = (event: any) => {
    console.log(event);
};

watch(nameFilter, debounce(handleNameFilterChange, 500));

onMounted(() => {
    if (nameFilter.value) {
        nameFilterInput.value?.$el.focus();
    }
});
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
                    <Input ref="nameFilterInput" v-model="nameFilter" type="text" placeholder="Search by name" class="w-full md:w-96" />
                    <Table>
                        <TableCaption>Lists of {{ data.total }} clubs</TableCaption>
                        <TableHeader>
                            <TableRow>
                                <TableHead class="w-[100px]"> #ID </TableHead>
                                <TableHead>Name</TableHead>
                                <TableHead>Leagues</TableHead>
                                <TableHead>Managers</TableHead>
                                <TableHead>Coaches</TableHead>
                                <TableHead class="text-right">Actions</TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            <TableRow v-if="!clubs.length">
                                <TableCell colspan="7" class="text-center">No clubs found</TableCell>
                            </TableRow>
                            <TableRow v-else v-for="club in clubs" :key="club.id">
                                <TableCell class="font-medium">{{ club.id }}</TableCell>
                                <TableCell>{{ club.name }}</TableCell>
                                <TableCell>
                                    <ScrollArea class="w-40">
                                        <div class="mb-3 flex gap-2">
                                            <Badge v-for="league in club.leagues" :key="league.id" variant="secondary" class="text-nowrap">{{
                                                league.name
                                            }}</Badge>
                                        </div>
                                        <ScrollBar orientation="horizontal" />
                                    </ScrollArea>
                                </TableCell>
                                <TableCell>
                                    <ScrollArea class="w-40">
                                        <div class="mb-3 flex flex-row gap-1">
                                            <template v-for="manager in club.managers" :key="manager.id">
                                                <AppUserInitialToolTip
                                                    :user-name="manager.name"
                                                    :user-id="manager.id"
                                                    @click="handleUserClick($event)"
                                                />
                                            </template>
                                        </div>
                                        <ScrollBar orientation="horizontal" />
                                    </ScrollArea>
                                </TableCell>
                                <TableCell>
                                    <ScrollArea class="w-40">
                                        <div class="mb-3 flex flex-row gap-1">
                                            <template v-for="coach in club.coaches" :key="coach.id">
                                                <AppUserInitialToolTip :user-name="coach.name" :user-id="coach.id" @click="handleUserClick($event)" />
                                            </template>
                                        </div>
                                        <ScrollBar orientation="horizontal" />
                                    </ScrollArea>
                                </TableCell>
                                <TableCell class="text-right"><Button>⚡️</Button></TableCell>
                            </TableRow>
                        </TableBody>
                    </Table>
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
