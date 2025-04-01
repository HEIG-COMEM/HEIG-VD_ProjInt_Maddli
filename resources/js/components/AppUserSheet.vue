<script setup lang="ts">
import TheLoading from '@/components/TheLoading.vue';
import { List, Muted, P } from '@/components/typography/texts';
import { Button } from '@/components/ui/button';
import { Sheet, SheetContent, SheetDescription, SheetHeader, SheetTitle, SheetTrigger } from '@/components/ui/sheet';
import { formatRoles } from '@/composables/useFormat';
import { router, useForm } from '@inertiajs/vue3';
import { useFetch } from '@vueuse/core';
import { Mail } from 'lucide-vue-next';
import AppAvatar from './AppAvatar.vue';

const props = withDefaults(
    defineProps<{
        userId: number;
        path?: string;
        title?: string;
        showNewChatButton?: boolean;
    }>(),
    {
        path: '/club/admin/users',
        title: 'User infos',
        showNewChatButton: false,
    },
);

interface Licence {
    id: number;
    name: string;
    created_at: string;
    updated_at: string;
}

interface Role {
    id: number;
    name: string;
    created_at: string;
    updated_at: string;
    pivot: {
        user_id: number;
        role_id: number;
    };
}

interface Club {
    id: number;
    name: string;
    created_at: string;
    updated_at: string;
}

interface League {
    id: number;
    name: string;
    nation_id: number;
    created_at: string;
    updated_at: string;
}

interface ClubLeague {
    id: number;
    club_id: number;
    league_id: number;
    created_at: string | null;
    updated_at: string | null;
    club: Club;
    league: League;
}

interface Coaching {
    id: number;
    club_league_id: number;
    user_id: number;
    created_at: string;
    updated_at: string;
    club_league: ClubLeague;
}

interface UserData {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
    birth_date: string;
    licence_id: number;
    created_at: string;
    updated_at: string;
    licence: Licence;
    roles: Role[];
    coaching: Coaching[];
}

const { isFetching, error, data: user } = useFetch<UserData>(`${props.path}/${props.userId}?json`, { refetch: true }).json();

const handleChat = () => {
    const form = useForm({
        user_id: props.userId,
    });
    form.post('new', {
        onFinish: () => {
            form.reset();
        },
        onSuccess: (response) => {
            router.visit(response.url);
        },
    });
};
</script>

<template>
    <Sheet>
        <SheetTrigger>
            <slot />
        </SheetTrigger>
        <SheetContent>
            <SheetHeader>
                <SheetTitle>{{ title }}</SheetTitle>
                <SheetDescription>
                    <div v-if="isFetching">
                        <TheLoading />
                    </div>
                    <div v-else-if="error">Error: {{ error }}</div>
                    <div v-else class="mt-24 flex w-full flex-col items-center gap-12">
                        <div class="text-center">
                            <div class="flex justify-center">
                                <AppAvatar :name="user.name" />
                            </div>
                            <P class="text-xl font-bold">{{ user.name }}</P>
                            <Muted>
                                {{ formatRoles(user.roles) }}
                            </Muted>
                            <div v-if="user.coaching.length > 0">
                                <List class="my-6 ml-6 list-disc [&>li]:mt-1">
                                    <Muted class="text-left">Coaching :</Muted>
                                    <li v-for="coaching in user.coaching" :key="coaching.id">
                                        {{ coaching.club_league.club.name }} - {{ coaching.club_league.league.name }}
                                    </li>
                                </List>
                            </div>
                        </div>
                        <Button variant="link">
                            <a :href="`mailto:${user.email}`" class="flex flex-row items-center text-sm text-foreground">
                                <Mail class="mr-2 h-4 w-4" />
                                {{ user.email }}
                            </a>
                        </Button>
                        <div class="flex flex-col items-center gap-2 text-foreground" v-if="showNewChatButton">
                            <P> Want to ask your questions directly ?</P>
                            <Button @click="handleChat()">Chat</Button>
                        </div>
                    </div>
                </SheetDescription>
            </SheetHeader>
        </SheetContent>
    </Sheet>
</template>
