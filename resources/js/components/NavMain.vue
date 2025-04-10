<script setup lang="ts">
import { Muted } from '@/components/typography/texts';
import { Badge } from '@/components/ui/badge';
import { Collapsible, CollapsibleContent, CollapsibleTrigger } from '@/components/ui/collapsible';
import {
    SidebarGroup,
    SidebarGroupLabel,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
    SidebarMenuSub,
    SidebarMenuSubButton,
    SidebarMenuSubItem,
} from '@/components/ui/sidebar';
import { Link } from '@inertiajs/vue3';
import { ChevronRight, type LucideIcon } from 'lucide-vue-next';
import { defineProps } from 'vue';

defineProps<{
    label: string;
    items: {
        title: string;
        href: string;
        icon?: LucideIcon;
        isActive?: boolean;
        items?: {
            title: string;
            href: string;
            isActive?: boolean;
            badge?: string;
        }[];
    }[];
}>();
</script>
<template>
    <SidebarGroup>
        <SidebarGroupLabel>{{ label }}</SidebarGroupLabel>
        <SidebarMenu>
            <template v-for="item in items" :key="item.title">
                <Collapsible v-if="item.items" as-child :default-open="item.isActive" class="group/collapsible">
                    <SidebarMenuItem>
                        <CollapsibleTrigger as-child>
                            <SidebarMenuButton :tooltip="item.title">
                                <component :is="item.icon" v-if="item.icon" />
                                <span>{{ item.title }}</span>
                                <ChevronRight class="ml-auto transition-transform duration-200 group-data-[state=open]/collapsible:rotate-90" />
                            </SidebarMenuButton>
                        </CollapsibleTrigger>
                        <CollapsibleContent>
                            <SidebarMenuSub v-if="item.items.length">
                                <SidebarMenuSubItem v-for="subItem in item.items" :key="subItem.title">
                                    <SidebarMenuSubButton as-child :is-active="subItem.isActive ?? false">
                                        <a :href="subItem.href">
                                            {{ subItem.title }}
                                            <Badge v-if="subItem.badge">
                                                {{ subItem.badge }}
                                            </Badge>
                                        </a>
                                    </SidebarMenuSubButton>
                                </SidebarMenuSubItem>
                            </SidebarMenuSub>
                            <Muted v-else class="px-4 py-2">No items</Muted>
                        </CollapsibleContent>
                    </SidebarMenuItem>
                </Collapsible>
                <SidebarMenuItem v-else>
                    <SidebarMenuButton as-child :is-active="item.isActive">
                        <Link :href="item.href">
                            <component :is="item.icon" />
                            <span>{{ item.title }}</span>
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </template>
        </SidebarMenu>
    </SidebarGroup>
</template>
