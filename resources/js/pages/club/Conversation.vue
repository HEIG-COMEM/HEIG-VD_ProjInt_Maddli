<script setup lang="ts">
import AppChatMessage from '@/components/AppChatMessage.vue';
import { Muted, P } from '@/components/typography/texts';
import { Avatar, AvatarFallback } from '@/components/ui/avatar';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { ScrollArea } from '@/components/ui/scroll-area';
import { getInitials } from '@/composables/useInitials';
import AppLayout from '@/layouts/AppLayout.vue';
import { SharedData, User, type BreadcrumbItem } from '@/types';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { Send } from 'lucide-vue-next';

const props = defineProps<{
    conversation: any;
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Home',
        href: '/club',
    },
    {
        title: 'Conversation',
        href: '/club/conversations',
    },
    {
        title: `${props.conversation.user.name || '...'}`,
        href: `/club/conversations/${props.conversation.id}`,
    },
];

const page = usePage<SharedData>();
const user = page.props.auth.user as User;

const form = useForm({
    newMessage: '',
});

const submit = () => {
    form.post(route('conversations.messages.store', props.conversation.id), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset('newMessage');
        },
    });
};

const formatRole = (role: string) => {
    return role.replace(/_/g, ' ').replace(/\b\w/g, (char) => char.toUpperCase());
};
</script>

<template>
    <Head title="Conversation" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl">
            <div class="relative flex max-h-20 flex-1 flex-row items-center gap-4 border-b border-sidebar-border/70 p-4 dark:border-sidebar-border">
                <Avatar class="size-8 overflow-hidden rounded-full">
                    <AvatarFallback class="rounded-lg bg-neutral-200 font-semibold text-black dark:bg-neutral-700 dark:text-white">
                        {{ getInitials(conversation.user.name) }}
                    </AvatarFallback>
                </Avatar>
                <div>
                    <P>{{ conversation.user.name }}</P>
                    <Muted>
                        <template v-for="role in conversation.user.roles">{{ formatRole(role.name) }}</template>
                    </Muted>
                </div>
            </div>
            <div class="flex max-h-[80dvh] flex-1 flex-col justify-between gap-4 p-4">
                <ScrollArea class="relative">
                    <div class="mr-4 space-y-4">
                        <AppChatMessage
                            v-for="message in conversation.messages"
                            :message="message.content"
                            :toMe="message.user_id !== user.id"
                            :key="message.id"
                        />
                    </div>
                </ScrollArea>
                <form @submit.prevent="submit()" class="mt-4 flex w-full items-center gap-1.5">
                    <Input type="text" placeholder="Type a message..." v-model="form.newMessage" />
                    <Button type="submit" size="icon">
                        <Send class="size-5" />
                    </Button>
                </form>
            </div>
        </div>
    </AppLayout>
</template>
