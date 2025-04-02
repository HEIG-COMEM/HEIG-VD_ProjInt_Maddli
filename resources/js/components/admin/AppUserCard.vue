<script setup lang="ts">
import AppAvatar from '@/components/AppAvatar.vue';
import { P } from '@/components/typography/texts';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader } from '@/components/ui/card';
import { Mail } from 'lucide-vue-next';

defineProps<{
    userId: number;
    name: string;
    email: string;
}>();
</script>

<template>
    <Card class="w-full max-w-xs">
        <CardHeader class="flex flex-row items-center space-x-4">
            <AppAvatar :name="name" />
            <div class="flex flex-col justify-between">
                <P class="text-lg font-bold">{{ name }}</P>
                <Button class="px-0" variant="link">
                    <a :href="`mailto:${email}`" class="flex flex-row items-center text-sm text-foreground">
                        <Mail class="mr-2 h-4 w-4" />
                        {{ email }}
                    </a>
                </Button>
            </div>
        </CardHeader>
        <CardContent>
            <slot name="content"></slot>
        </CardContent>
    </Card>
</template>

<style scoped></style>
