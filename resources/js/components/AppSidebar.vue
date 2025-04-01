<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type CollapsibleNavItem, type NavItem, type SharedData } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { Building2, House, Info, List, MessageCircle, Users } from 'lucide-vue-next';
import { onMounted, reactive, ref } from 'vue';
import AppLogo from './AppLogo.vue';
import NavMain from './NavMain.vue';
import NavSidebarGroup from './NavSidebarGroup.vue';

const conversations = reactive<{ title: string; href: string; badge: string }[]>([]);

onMounted(async () => {
    const response = await fetch(`/club/conversations?json`);
    const data = await response.json();
    const prepared = data.map((item: any) => {
        return {
            title: `${item.user.name}`,
            href: `/club/conversations/${item.id}`,
            ...(item.unreadMessagesCount ? { badge: `${item.unreadMessagesCount}` } : {}),
        };
    });

    conversations.push(...prepared);
});

const mainNavItems = ref<CollapsibleNavItem[]>([
    {
        title: 'Home',
        href: '/club/',
        icon: House,
        isActive: true,
    },
    {
        title: 'Lists',
        href: '/club/lists',
        icon: List,
        isActive: true,
    },
    {
        title: 'Conversations',
        href: '/club/conversations',
        icon: MessageCircle,
        isActive: true,
        items: conversations,
    },
]);

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
            <NavSidebarGroup
                :items="adminNavItems"
                label="Administration"
                v-if="roles.some((role) => ['uefa_manager', 'federation_manager', 'club_manager'].includes(role))"
            />
            <NavMain :items="mainNavItems" label="Platform" />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
