<script setup lang="ts">
import { Muted, P } from '@/components/typography/texts';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardFooter, CardHeader } from '@/components/ui/card';
import { router, useForm } from '@inertiajs/vue3';
import { Mail, MessageCircle } from 'lucide-vue-next';
import AppAvatar from './AppAvatar.vue';

const props = defineProps<{
    userId: number;
    name: string;
    role: string;
    email: string;
}>();

const handleChat = () => {
    const form = useForm({
        user_id: props.userId,
    });
    form.post(route('club.conversations.new'), {
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
    <Card class="w-full max-w-sm">
        <CardHeader class="flex flex-row items-center space-x-4">
            <AppAvatar :name="name" />
            <div class="flex flex-col justify-between">
                <P class="text-lg font-bold">{{ name }}</P>
                <Muted>{{ role }}</Muted>
            </div>
        </CardHeader>
        <CardContent>
            <Button variant="link">
                <a :href="`mailto:${email}`" class="flex flex-row items-center text-sm text-foreground">
                    <Mail class="mr-2 h-4 w-4" />
                    {{ email }}
                </a>
            </Button>
        </CardContent>
        <CardFooter>
            <Button class="w-full" @click="handleChat()">
                <MessageCircle class="mr-2 h-4 w-4" />
                Quick Chat
            </Button>
        </CardFooter>
    </Card>
</template>

<style scoped></style>
