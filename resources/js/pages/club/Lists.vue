<script setup lang="ts">
import AppContactCard from '@/components/AppContactCard.vue';
import { H1, H2 } from '@/components/typography/headings';
import { Lead } from '@/components/typography/texts';
import { ScrollArea, ScrollBar } from '@/components/ui/scroll-area';
import { formatRoles } from '@/composables/useFormat';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Home',
        href: '/club',
    },
    {
        title: 'Lists',
        href: '/club/lists',
    },
];

defineProps<{
    contacts: {
        federations: any[] | null;
        ambassadors: any[] | null;
        prospects: any[] | null;
        mentors: any[] | null;
        mentees: any[] | null;
    };
}>();
</script>

<template>
    <Head title="Lists" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border md:min-h-min">
                <H1 class="mb-12">Contact list</H1>
                <template v-if="contacts.federations">
                    <H2>Federations</H2>
                    <Lead class="mb-4">
                        In case you ever need to contact the federation for important matters, you can find their contact information here.
                    </Lead>
                    <ScrollArea class="w-[80dvw]" type="hover">
                        <div class="mb-4 flex flex-row gap-4">
                            <AppContactCard
                                v-for="contact in contacts.federations"
                                :key="contact.id"
                                :name="contact.name"
                                :role="formatRoles(contact.roles)"
                                :user-id="contact.id"
                                :email="contact.email"
                            />
                        </div>
                        <ScrollBar orientation="horizontal" />
                    </ScrollArea>
                </template>
                <template v-if="contacts.ambassadors">
                    <H2>Ambassador</H2>
                    <Lead class="mb-4">
                        If you have any questions or need assistance, feel free to reach out to your ambassadors.<br />She is here to help you make
                        your mind up.
                    </Lead>
                    <ScrollArea class="w-[80dvw]" type="hover">
                        <div class="mb-4 flex flex-row gap-4">
                            <AppContactCard
                                v-for="contact in contacts.ambassadors"
                                :key="contact.user.id"
                                :name="contact.user.name"
                                :role="formatRoles(contact.user.roles)"
                                :user-id="contact.user.id"
                                :email="contact.user.email"
                            />
                        </div>
                        <ScrollBar orientation="horizontal" />
                    </ScrollArea>
                </template>
                <template v-if="contacts.prospects">
                    <H2>Prospects</H2>
                    <Lead class="mb-4">
                        These contacts are the women who are interested in getting a coaching license. They might reach out to you for help or
                        questions.<br />Make sure to provide them with the necessary guidance and support.
                    </Lead>
                    <ScrollArea class="w-[80dvw]" type="hover">
                        <div class="mb-4 flex flex-row gap-4">
                            <AppContactCard
                                v-for="contact in contacts.prospects"
                                :key="contact.user.id"
                                :name="contact.user.name"
                                :role="formatRoles(contact.user.roles)"
                                :user-id="contact.user.id"
                                :email="contact.user.email"
                            />
                        </div>
                        <ScrollBar orientation="horizontal" />
                    </ScrollArea>
                </template>
                <template v-if="contacts.mentors">
                    <H2>Mentors</H2>
                    <Lead class="mb-4">
                        Your mentor is here to help you with any questions or concerns you may have about your coaching journey.
                    </Lead>
                    <ScrollArea class="w-[80dvw]" type="hover">
                        <div class="mb-4 flex flex-row gap-4">
                            <AppContactCard
                                v-for="contact in contacts.mentors"
                                :key="contact.user.id"
                                :name="contact.user.name"
                                :role="formatRoles(contact.user.roles)"
                                :user-id="contact.user.id"
                                :email="contact.user.email"
                            />
                        </div>
                        <ScrollBar orientation="horizontal" />
                    </ScrollArea>
                </template>
                <template v-if="contacts.mentees">
                    <H2>Mentees</H2>
                    <Lead class="mb-4">
                        Your mentees are women you are guiding and supporting in their coaching journey. Be sure to provide them with encouragement
                        and advice to help them succeed.
                    </Lead>
                    <ScrollArea class="w-[80dvw]" type="hover">
                        <div class="mb-4 flex flex-row gap-4">
                            <AppContactCard
                                v-for="contact in contacts.mentees"
                                :key="contact.user.id"
                                :name="contact.user.name"
                                :role="formatRoles(contact.user.roles)"
                                :user-id="contact.user.id"
                                :email="contact.user.email"
                            />
                        </div>
                        <ScrollBar orientation="horizontal" />
                    </ScrollArea>
                </template>
            </div>
        </div>
    </AppLayout>
</template>
