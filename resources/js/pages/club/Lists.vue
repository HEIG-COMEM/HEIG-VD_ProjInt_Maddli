<script setup lang="ts">
import AppContactSection from '@/components/AppContactSection.vue';
import AppFindRepresentative from '@/components/AppFindRepresentative.vue';
import { H1 } from '@/components/typography/headings';
import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert';
import { Button } from '@/components/ui/button';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem, type SharedData } from '@/types';
import { Head, usePage } from '@inertiajs/vue3';
import { Rocket } from 'lucide-vue-next';
import { computed } from 'vue';

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

const props = defineProps<{
    contacts: {
        federations: any[] | null;
        ambassadors: any[] | null;
        prospects: any[] | null;
        mentors: any[] | null;
        mentees: any[] | null;
    };
}>();

const page = usePage<SharedData>();
const isNewUser = computed(() => !page.props.auth.roles.length);
const requireMentor = computed(() => {
    return !!(page.props.auth.user.licence_id && (!props.contacts.mentors || !props.contacts.mentors.length));
});
</script>

<template>
    <Head title="Lists" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border md:min-h-min">
                <H1 class="mb-12">Contact list</H1>
                <template v-if="isNewUser && !requireMentor">
                    <Alert class="mb-8">
                        <Rocket class="h-4 w-4" />
                        <AlertTitle>Welcome to <span class="text-accent"> The Club</span></AlertTitle>
                        <AlertDescription>
                            <div class="text-pretty">Let's get started and find an ambassador !</div>
                            <AppFindRepresentative
                                title="Find an ambassador"
                                description="We will find a ambassador for you. Please fill out the form so we can determine the best match."
                                save-label="Find an ambassador"
                            >
                                <template #trigger>
                                    <Button variant="outline" class="mt-4">Find an ambassador</Button>
                                </template>
                            </AppFindRepresentative>
                        </AlertDescription>
                    </Alert>
                </template>
                <template v-if="requireMentor">
                    <Alert class="mb-8">
                        <Rocket class="h-4 w-4" />
                        <AlertTitle>Well done for your coaching <span class="text-accent">licence</span></AlertTitle>
                        <AlertDescription>
                            <div class="text-pretty">Let's get started and find a mentor !</div>
                            <AppFindRepresentative
                                title="Find a mentor"
                                description="We will find a mentor for you. Please fill out the form so we can determine the best match."
                                save-label="Find a mentor"
                                role="mentor"
                            >
                                <template #trigger>
                                    <Button variant="outline" class="mt-4">Find a mentor</Button>
                                </template>
                            </AppFindRepresentative>
                        </AlertDescription>
                    </Alert>
                </template>
                <AppContactSection
                    v-if="contacts.federations"
                    title="Federations"
                    description="In case you ever need to contact the federation for important matters, you can find their contact information here."
                    :contacts="contacts.federations"
                    key-prefix="federation"
                />
                <AppContactSection
                    v-if="contacts.ambassadors"
                    title="Ambassador"
                    description="If you have any questions or need assistance, feel free to reach out to your ambassadors. She is here to help you make your mind up."
                    :contacts="contacts.ambassadors"
                    key-prefix="ambassador"
                />
                <AppContactSection
                    v-if="contacts.prospects"
                    title="Prospects"
                    description="These contacts are the women who are interested in getting a coaching license. They might reach out to you for help or questions. Make sure to provide them with the necessary guidance and support."
                    :contacts="contacts.prospects"
                    key-prefix="prospect"
                />
                <AppContactSection
                    v-if="contacts.mentors"
                    title="Mentors"
                    description="Your mentor is here to help you with any questions or concerns you may have about your coaching journey."
                    :contacts="contacts.mentors"
                    key-prefix="mentor"
                />
                <AppContactSection
                    v-if="contacts.mentees"
                    title="Mentees"
                    description="Your mentees are women you are guiding and supporting in their coaching journey. Be sure to provide them with encouragement and advice to help them succeed."
                    :contacts="contacts.mentees"
                    key-prefix="mentee"
                />
            </div>
        </div>
    </AppLayout>
</template>
