<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type CollapsibleNavItem, type NavItem, type SharedData } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { Building2, House, Info, Users } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';
import NavSidebarGroup from './NavSidebarGroup.vue';

const mainNavItems: CollapsibleNavItem[] = [
    {
        title: 'Home',
        href: '/club/',
        icon: House,
        isActive: true,
        items: [
            {
                title: 'Dashboard',
                href: '/club/',
            },
            {
                title: 'Clubs',
                href: '/club/clubs',
            },
        ],
    },
];

const adminNavItems: NavItem[] = [
    {
        title: 'Clubs',
        href: '/club/admin/clubs',
        icon: Building2,
    },
    {
        title: 'Users',
        href: '/club/admin/users',
        icon: Users,
    },
];

const footerNavItems: NavItem[] = [
    {
        title: 'Informations',
        href: '/club/infos',
        icon: Info,
    },
];

const page = usePage<SharedData>();
const roles = page.props.auth.roles as string[];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="route('club.home')">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavSidebarGroup :items="adminNavItems" label="Administration" v-if="roles.includes('uefa_manager')" />
            <NavSidebarGroup :items="mainNavItems" label="Platform" />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
