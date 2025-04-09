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
import { Dot, Menu, Moon, Sun } from 'lucide-vue-next';
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
const [UseThemeToggle, ThemeToggle] = createReusableTemplate();
const { appearance, updateAppearance } = useAppearance();

const handleToggleAppearance = () => updateAppearance(appearance.value === 'light' ? 'dark' : 'light');
</script>

<template>
    <UseTemplate>
        <a :href="route('home')" class="flex h-full cursor-pointer items-center space-x-2">
            <img :src="appearance === 'dark' ? '/assets/icons/logo-dark.svg' : '/assets/icons/logo.svg'" alt="Logo" class="hidden h-3/4 sm:block" />
            <img
                :src="appearance === 'dark' ? '/assets/icons/logo-icon-dark.svg' : '/assets/icons/logo-icon.svg'"
                alt="Logo"
                class="block h-1/2 sm:hidden"
            />
        </a>
    </UseTemplate>

    <UseThemeToggle>
        <Button variant="ghost" size="icon" @click="handleToggleAppearance()">
            <Moon class="rotate-0 scale-100 transition-all duration-500 dark:-rotate-90 dark:scale-0" />
            <Sun class="absolute rotate-90 scale-0 transition-all duration-500 dark:rotate-0 dark:scale-100" />
            <span class="sr-only">Toggle theme</span>
        </Button>
    </UseThemeToggle>

    <div class="flex h-16 items-center justify-between px-4">
        <HomeLink />

        <template v-if="!isDesktop">
            <div class="flex flex-row items-center gap-4">
                <ThemeToggle />
                <Sheet>
                    <SheetTrigger>
                        <Button variant="ghost" size="icon">
                            <Menu />
                        </Button>
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
                                        <Button variant="link" size="lg" class="!text-accent"> Log In / Register </Button>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </SheetContent>
                </Sheet>
            </div>
        </template>
        <template v-else>
            <NavigationMenu>
                <NavigationMenuList>
                    <NavigationMenuItem v-for="(item, index) in items" :key="item.name" class="flex items-center">
                        <NavigationMenuLink :href="route(item.href)" :class="navigationMenuTriggerStyle()" :active="route().current() === item.href">
                            {{ item.name }}
                        </NavigationMenuLink>
                        <Dot class="mx-2 h-1 w-1 rounded-full bg-foreground" v-if="index < items.length - 1" />
                    </NavigationMenuItem>
                </NavigationMenuList>
            </NavigationMenu>
            <NavigationMenu>
                <NavigationMenuList>
                    <NavigationMenuItem>
                        <ThemeToggle />
                    </NavigationMenuItem>
                    <NavigationMenuItem class="border-l border-foreground" aria-hidden="true">&nbsp;</NavigationMenuItem>
                    <NavigationMenuItem>
                        <NavigationMenuLink
                            :href="route('club.home')"
                            :class="navigationMenuTriggerStyle()"
                            class="!bg-accent !text-accent-foreground"
                        >
                            Log In / Register
                        </NavigationMenuLink>
                    </NavigationMenuItem>
                </NavigationMenuList>
            </NavigationMenu>
        </template>
    </div>
</template>

<style scoped></style>
