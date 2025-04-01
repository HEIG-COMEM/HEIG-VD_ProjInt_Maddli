<script setup lang="ts">
import AppPagination from '@/components/AppPagination.vue';
import { H1 } from '@/components/typography/headings';
import { Lead } from '@/components/typography/texts';
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

const users = ref(props.data.data);
const path = ref(props.data.path);
const nameFilter = ref(props.filters.name || '');
const nameFilterInput = useTemplateRef('nameFilterInput');

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Home',
        href: '/club',
    },
    {
        title: 'Users',
        href: '/club/admin/users',
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

const formatRole = (role: string) => {
    role = role.replace('_', ' ');
    return role.charAt(0).toUpperCase() + role.slice(1);
};

watch(nameFilter, debounce(handleNameFilterChange, 500));

onMounted(() => {
    if (nameFilter.value) {
        nameFilterInput.value?.$el.focus();
    }
});
</script>

<template>
    <Head title="Users" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div>
                <H1>Users</H1>
                <Lead>Manage users</Lead>
            </div>
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <div class="flex flex-col items-center justify-center gap-2 p-4">
                    <Input ref="nameFilterInput" v-model="nameFilter" type="text" placeholder="Search by name" class="w-full md:w-96" />
                    <Table>
                        <TableCaption>Lists of {{ data.total }} users</TableCaption>
                        <TableHeader>
                            <TableRow>
                                <TableHead class="w-[100px]"> #ID </TableHead>
                                <TableHead>Name</TableHead>
                                <TableHead>Email</TableHead>
                                <TableHead>Roles</TableHead>
                                <TableHead>Coaching affectations</TableHead>
                                <TableHead>Managing affectations</TableHead>
                                <TableHead class="text-right">Actions</TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            <TableRow v-if="!users.length">
                                <TableCell colspan="7" class="text-center">No users found</TableCell>
                            </TableRow>
                            <TableRow v-else v-for="user in users" :key="user.id">
                                <TableCell class="font-medium">{{ user.id }}</TableCell>
                                <TableCell>{{ user.name }}</TableCell>
                                <TableCell>{{ user.email }}</TableCell>
                                <TableCell>
                                    <ScrollArea class="w-40">
                                        <div class="mb-3 flex gap-2">
                                            <Badge v-for="role in user.roles" :key="role.id" variant="secondary" class="text-nowrap">{{
                                                formatRole(role.name)
                                            }}</Badge>
                                            <Badge v-if="user.licence"
                                                >Coach<span>({{ user.licence.name }})</span></Badge
                                            >
                                        </div>
                                        <ScrollBar orientation="horizontal" />
                                    </ScrollArea>
                                </TableCell>
                                <TableCell>
                                    <p v-for="(coaches, index) in user.coaching" :key="coaches.id">
                                        {{ coaches.club_league.club.name }} - {{ coaches.club_league.league.name
                                        }}<span v-if="index != user.coaching.length - 1">,</span>
                                    </p>
                                </TableCell>
                                <TableCell>
                                    <p v-for="(club, index) in user.clubs" :key="club.id">
                                        {{ club.name }}<span v-if="index != user.clubs.length - 1">,</span>
                                    </p>
                                </TableCell>
                                <TableCell class="text-right"><Button>⚡️</Button></TableCell>
                            </TableRow>
                        </TableBody>
                    </Table>

                    <AppPagination
                        v-if="users.length"
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
