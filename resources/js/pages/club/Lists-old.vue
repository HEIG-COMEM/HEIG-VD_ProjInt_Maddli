<script setup lang="ts">
import TheLoading from '@/components/TheLoading.vue';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { Popover, PopoverContent, PopoverTrigger } from '@/components/ui/popover';
import { Toggle } from '@/components/ui/toggle';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { useFetch } from '@vueuse/core';
import { Check, SlidersHorizontal } from 'lucide-vue-next';
import { onMounted, reactive, watchEffect } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Home',
        href: '/club',
    },
    {
        title: 'Lists',
        href: '/club/lists',
    },
];

const filters = reactive({
    ambassadors: {
        name: 'Ambassadors',
        value: false,
    },
    federation: {
        name: 'Federation',
        value: false,
    },
    mentors: {
        name: 'Mentors',
        value: false,
    },
});
const { isFetching, error, data } = useFetch(
    () => `/club/lists?json=1&ambassadors=${+filters.ambassadors.value}&federation=${+filters.federation.value}&mentors=${+filters.mentors.value}`,
    { refetch: true },
).json();

watchEffect(() => {
    console.log('Filters:', filters);
});

onMounted(() => {
    const params = new URLSearchParams(window.location.search);
    for (const [key, value] of params.entries()) {
        if (key in filters) {
            filters[key as keyof typeof filters].value = value === '1';
        }
    }
});
</script>

<template>
    <Head title="Lists" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-5">
                <div class="relative overflow-hidden rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border md:col-span-4">
                    {{ filters.ambassadors }}
                    {{ filters.federation }}
                    {{ filters.mentors }}
                </div>
                <div class="relative overflow-hidden rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border">
                    <Popover>
                        <PopoverTrigger>
                            <Button variant="secondary">
                                <SlidersHorizontal class="mr-1 h-4 w-4" />
                                <span>
                                    Filters
                                    <template v-if="Object.values(filters).some((filter) => filter.value)">
                                        <Badge class="ml-2">
                                            {{ Object.values(filters).filter((filter) => filter.value).length }}
                                        </Badge>
                                    </template>
                                </span>
                            </Button>
                        </PopoverTrigger>
                        <PopoverContent class="w-fit">
                            <div class="flex w-fit flex-col gap-2">
                                <template v-for="filter in filters" :key="filter.name">
                                    <Toggle v-model="filter.value" class="justify-start">
                                        <Check v-if="filter.value" class="mr-2 h-4 w-4" />
                                        <span v-else class="mr-2 h-4 w-4" />
                                        <span class="text-sm font-medium text-foreground">
                                            {{ filter.name }}
                                        </span>
                                    </Toggle>
                                </template>
                            </div>
                        </PopoverContent>
                    </Popover>
                </div>
            </div>
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border md:min-h-min">
                <template v-if="isFetching">
                    <TheLoading />
                </template>
                <template v-else-if="error">
                    <div class="text-red-500">Error: {{ error }}</div>
                </template>
                <template v-else>
                    <div v-for="user in data?.users" :key="user.id">
                        {{ user.name }} - <template v-for="role in user.roles">{{ role.name }}</template>
                    </div>
                </template>
            </div>
        </div>
    </AppLayout>
</template>
