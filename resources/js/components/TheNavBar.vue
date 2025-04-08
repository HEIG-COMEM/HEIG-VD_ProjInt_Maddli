<script setup lang="ts">
import { Button } from '@/components/ui/button';
import {
    NavigationMenu,
    NavigationMenuItem,
    NavigationMenuLink,
    NavigationMenuList,
    navigationMenuTriggerStyle,
} from '@/components/ui/navigation-menu';

import { Sheet, SheetContent, SheetDescription, SheetHeader, SheetTitle, SheetTrigger } from '@/components/ui/sheet';
import { useAppearance } from '@/composables/useAppearance';
import { createReusableTemplate, useMediaQuery } from '@vueuse/core';
import { Menu } from 'lucide-vue-next';
import { reactive } from 'vue';

const isDesktop = useMediaQuery('(min-width: 768px)');
const items = reactive([
    {
        name: 'Simulation',
        href: 'become-coach',
    },
    {
        name: 'Help Starter Pack',
        href: 'hsp',
    },
    {
        name: 'Club',
        href: 'club.infos',
    },
]);

const [UseTemplate, HomeLink] = createReusableTemplate();
const { appearance } = useAppearance();
</script>

<template>
    <UseTemplate>
        <a :href="route('home')" class="flex h-full cursor-pointer items-center space-x-2">
            <img :src="appearance === 'light' ? '/assets/icons/logo.svg' : '/assets/icons/logo-dark.svg'" alt="Logo" class="hidden h-3/4 sm:block" />
            <img
                :src="appearance === 'light' ? '/assets/icons/logo-icon.svg' : '/assets/icons/logo-icon-dark.svg'"
                alt="Logo"
                class="block h-1/2 sm:hidden"
            />
        </a>
    </UseTemplate>

    <div class="flex h-16 items-center justify-between px-4">
        <HomeLink />

        <template v-if="!isDesktop">
            <Sheet>
                <SheetTrigger>
                    <Menu class="h-8 w-8 cursor-pointer" />
                </SheetTrigger>
                <SheetContent>
                    <SheetHeader class="h-12">
                        <SheetTitle class="sr-only">Menu</SheetTitle>
                        <SheetDescription class="sr-only">Navigation menu</SheetDescription>
                    </SheetHeader>
                    <nav class="mt-6">
                        <ul class="space-y-4">
                            <li>
                                <a :href="route('home')">
                                    <Button variant="link" size="lg" :class="route().current() === 'home' ? '!text-accent underline' : ''">
                                        Home
                                    </Button>
                                </a>
                            </li>
                            <li v-for="item in items" :key="item.name">
                                <a :href="route(item.href)">
                                    <Button variant="link" size="lg" :class="route().current() === item.href ? '!text-accent underline' : ''">
                                        {{ item.name }}
                                    </Button>
                                </a>
                            </li>
                            <li class="border-t border-foreground" aria-hidden="true"></li>
                            <li>
                                <a :href="route('club.home')">
                                    <Button variant="link" size="lg" class="!text-accent"> Login </Button>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </SheetContent>
            </Sheet>
        </template>
        <template v-else>
            <NavigationMenu>
                <NavigationMenuList>
                    <NavigationMenuItem v-for="item in items" :key="item.name">
                        <NavigationMenuLink :href="route(item.href)" :class="navigationMenuTriggerStyle()" :active="route().current() === item.href">
                            {{ item.name }}
                        </NavigationMenuLink>
                    </NavigationMenuItem>
                    <NavigationMenuItem class="border-l border-foreground" aria-hidden="true">&nbsp;</NavigationMenuItem>
                    <NavigationMenuItem>
                        <NavigationMenuLink
                            :href="route('club.home')"
                            :class="navigationMenuTriggerStyle()"
                            class="!bg-accent !text-accent-foreground"
                        >
                            Login
                        </NavigationMenuLink>
                    </NavigationMenuItem>
                </NavigationMenuList>
            </NavigationMenu>
        </template>
    </div>
</template>

<style scoped></style>
