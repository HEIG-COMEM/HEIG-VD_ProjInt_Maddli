<script setup lang="ts">
import AppContactSection from '@/components/AppContactSection.vue';
import AppFindRepresentative from '@/components/AppFindRepresentative.vue';
import { H1 } from '@/components/typography/headings';
import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert';
import { Button } from '@/components/ui/button';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { Rocket } from 'lucide-vue-next';
import { ref } from 'vue';

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

const props = withDefaults(
    defineProps<{
        newUser?: boolean;
        contacts: {
            federations: any[] | null;
            ambassadors: any[] | null;
            prospects: any[] | null;
            mentors: any[] | null;
            mentees: any[] | null;
        };
    }>(),
    {
        newUser: false,
    },
);

const isNewUser = ref(props.newUser);
console.log(isNewUser.value);
</script>

<template>
    <Head title="Lists" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border md:min-h-min">
                <H1 class="mb-12">Contact list</H1>
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
                <template v-if="isNewUser">
                    <Alert>
                        <Rocket class="h-4 w-4" />
                        <AlertTitle>Welcome to the <span class="uppercase text-accent-foreground">club</span></AlertTitle>
                        <AlertDescription>
                            <div>Let's get started and find a mentor !</div>
                            <AppFindRepresentative
                                title="Find a mentor"
                                description="We will find a mentor for you. Please fill out the form so we can determine the best match."
                                save-label="Find a mentor"
                            >
                                <template #trigger>
                                    <Button variant="outline" class="mt-4">Find a mentor</Button>
                                </template>
                            </AppFindRepresentative>
                        </AlertDescription>
                    </Alert>
                </template>
            </div>
        </div>
    </AppLayout>
</template>
