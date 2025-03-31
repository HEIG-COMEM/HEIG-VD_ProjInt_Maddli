<script setup lang="ts">
import { Muted, P } from './typography/texts';
interface Message {
    id: number;
    user_id: number;
    conversation_id: number;
    content: string;
    created_at: string;
    updated_at: string;
}

defineProps<{
    message: Message;
    toMe?: boolean;
}>();
</script>

<template>
    <div
        :class="[
            'flex w-max max-w-full flex-col gap-2 break-words rounded-lg px-3 py-2 text-sm md:max-w-[45%]',
            toMe ? 'bg-muted' : 'ml-auto bg-primary text-primary-foreground',
        ]"
    >
        <P>
            {{ message.content }}
        </P>
        <Muted class="text-xs text-muted-foreground">
            {{ new Date(message.created_at).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) }}
        </Muted>
    </div>
</template>

<style scoped></style>
