<script setup lang="ts">
import AppContactCard from '@/components/AppContactCard.vue';
import { H2 } from '@/components/typography/headings';
import { Lead } from '@/components/typography/texts';
import { ScrollArea, ScrollBar } from '@/components/ui/scroll-area';
import { formatRoles } from '@/composables/useFormat';

defineProps<{
    title: string;
    description: string;
    contacts: any[];
    keyPrefix: string;
}>();
</script>

<template>
    <template v-if="contacts && contacts.length">
        <H2>{{ title }}</H2>
        <Lead class="mb-4">{{ description }}</Lead>
        <ScrollArea class="w-[80dvw]" type="hover">
            <div class="mb-4 flex flex-row gap-4">
                <AppContactCard
                    v-for="contact in contacts"
                    :key="`${keyPrefix}-${contact.user?.id || contact.id}`"
                    :name="contact.user?.name || contact.name"
                    :role="formatRoles(contact.user?.roles || contact.roles)"
                    :user-id="contact.user?.id || contact.id"
                    :email="contact.user?.email || contact.email"
                />
            </div>
            <ScrollBar orientation="horizontal" />
        </ScrollArea>
    </template>
</template>
