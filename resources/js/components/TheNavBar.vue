<script setup lang="ts">
import { Lead } from '@/components/typography/texts';
import { Button } from '@/components/ui/button';
import {
    NavigationMenu,
    NavigationMenuItem,
    NavigationMenuLink,
    NavigationMenuList,
    navigationMenuTriggerStyle,
} from '@/components/ui/navigation-menu';
import { Sheet, SheetContent, SheetHeader, SheetTrigger } from '@/components/ui/sheet';
import { createReusableTemplate, useMediaQuery } from '@vueuse/core';
import { Menu } from 'lucide-vue-next';
import { reactive } from 'vue';

const isDesktop = useMediaQuery('(min-width: 768px)');
const items = reactive([
    {
        name: 'Simulation',
        href: route('become-coach'),
    },
    {
        name: 'Help Starter Pack',
        href: '/docs/introduction',
    },
    {
        name: 'Club',
        href: route('club.infos'),
    },
]);

const [UseTemplate, HomeLink] = createReusableTemplate();
</script>

<template>
    <UseTemplate>
        <a :href="route('home')" class="flex items-center space-x-2">
            <img src="/images/logo.png" alt="Logo" class="h-8 w-8" />
            <!-- TODO: Set logo-->
            <Lead class="font-bold text-accent">Hello Coach</Lead>
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
                    <SheetHeader>
                        <HomeLink />
                    </SheetHeader>
                    <nav class="mt-12">
                        <ul class="space-y-4">
                            <li v-for="item in items" :key="item.name">
                                <a :href="item.href">
                                    <Button variant="link" size="lg">
                                        {{ item.name }}
                                    </Button>
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
                        <NavigationMenuLink :href="item.href" :class="navigationMenuTriggerStyle()"> {{ item.name }} </NavigationMenuLink>
                    </NavigationMenuItem>
                </NavigationMenuList>
            </NavigationMenu>
        </template>
    </div>
</template>

<style scoped></style>
