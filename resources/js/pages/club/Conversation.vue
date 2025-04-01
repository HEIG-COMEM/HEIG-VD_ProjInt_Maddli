<script setup lang="ts">
import AppAvatar from '@/components/AppAvatar.vue';
import AppChatMessage from '@/components/AppChatMessage.vue';
import AppUserSheet from '@/components/AppUserSheet.vue';
import { Muted, P } from '@/components/typography/texts';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { ScrollArea } from '@/components/ui/scroll-area';
import AppLayout from '@/layouts/AppLayout.vue';
import { SharedData, User, type BreadcrumbItem } from '@/types';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { Send } from 'lucide-vue-next';
import { onMounted, useTemplateRef } from 'vue';
import { toast } from 'vue-sonner';

const props = defineProps<{
    conversation: any;
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Home',
        href: '/club',
    },
    {
        title: 'Conversations',
        href: '/club/conversations',
    },
    {
        title: `${props.conversation.user.name || '...'}`,
        href: `/club/conversations/${props.conversation.id}`,
    },
];

const page = usePage<SharedData>();
const user = page.props.auth.user as User;
const scrollArea = useTemplateRef('scrollArea');

const form = useForm({
    newMessage: '',
});

const submit = () => {
    form.post(route('club.conversations.message', props.conversation.id), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset('newMessage');
        },
        onError: () => {
            toast.error('Failed to send message.');
        },
        onFinish: () => {
            scrollToBottom();
        },
    });
};

const scrollToBottom = ({ behavior = 'smooth' } = {}) => {
    // Scroll to the bottom of the chat area when a new message is sent
    if (scrollArea.value) {
        const scrollable = scrollArea.value.$el.querySelector('div');
        if (scrollable) {
            scrollable.scrollTo({ top: scrollable.scrollHeight, behavior });
        }
    }
};

onMounted(() => {
    scrollToBottom({ behavior: 'auto' });
});

const formatRole = (role: string) => {
    return role.replace(/_/g, ' ').replace(/\b\w/g, (char) => char.toUpperCase());
};
</script>

<template>
    <Head title="Conversation" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl">
            <div class="relative border-b border-sidebar-border/70 p-4 dark:border-sidebar-border">
                <AppUserSheet :user-id="conversation.user.id" :path="`/club/users`">
                    <div class="flex flex-row items-center gap-4 text-left">
                        <AppAvatar :name="conversation.user.name" />
                        <div>
                            <P>{{ conversation.user.name }}</P>
                            <Muted>
                                <template v-for="role in conversation.user.roles">{{ formatRole(role.name) }}</template>
                            </Muted>
                        </div>
                    </div>
                </AppUserSheet>
            </div>
            <div class="flex max-h-[80dvh] max-w-[100dvw] flex-1 flex-col justify-between gap-4 p-4 md:max-w-[85dvw]">
                <ScrollArea ref="scrollArea" class="relative">
                    <div class="mr-4 space-y-4">
                        <template v-for="(message, index) in conversation.messages" :key="message.id">
                            <template
                                v-if="
                                    index === 0 ||
                                    new Date(message.created_at).toDateString() !==
                                        new Date(conversation.messages[index - 1].created_at).toDateString()
                                "
                            >
                                <P class="text-center text-xs text-muted-foreground">
                                    {{
                                        new Date(message.created_at).toLocaleDateString('en-US', {
                                            month: 'long',
                                            day: 'numeric',
                                            year: 'numeric',
                                        })
                                    }}
                                </P>
                            </template>
                            <AppChatMessage :message="message" :toMe="message.user_id !== user.id" />
                        </template>
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
