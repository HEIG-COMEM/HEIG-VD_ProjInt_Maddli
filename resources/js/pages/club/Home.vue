<script setup lang="ts">
import AppOnBoardingCard from '@/components/AppOnBoardingCard.vue';
import { H1, H3 } from '@/components/typography/headings';
import { Lead, P } from '@/components/typography/texts';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { Building, HandHelping, HeartHandshake } from 'lucide-vue-next';

defineProps<{
    user: any;
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Home',
        href: '/club',
    },
];
</script>

<template>
    <Head title="Home" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div>
                <H1
                    >Hey, <span class="text-primary">{{ user.name }}</span></H1
                >
                <Lead>Get started and get your questions answered!</Lead>
            </div>
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <AppOnBoardingCard title="Contact your federation" :href="route('club.lists', { federation: true })">
                    <template #icon>
                        <Building :size="64" :stroke-width="1" />
                    </template>
                </AppOnBoardingCard>
                <AppOnBoardingCard title="Talk to ambassadors" :href="route('club.lists', { ambassadors: true })">
                    <template #icon>
                        <HandHelping :size="64" :stroke-width="1" />
                    </template>
                </AppOnBoardingCard>
                <AppOnBoardingCard title="Talk to mentors" :href="route('club.lists', { mentors: true })">
                    <template #icon>
                        <HeartHandshake :size="64" :stroke-width="1" />
                    </template>
                </AppOnBoardingCard>
            </div>
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border md:min-h-min">
                <H3>Real Voices to Guide Your Journey</H3>
                <P>
                    Becoming a coach is not just about taking a course — it’s about understanding what it really means to lead, support, and grow with
                    a team. That’s why connecting with others who have already gone through this journey is so important. By talking to ambassadors,
                    you can hear real stories from active coaches who once stood where you are now. They can share practical tips, motivation, and
                    honest advice that no textbook will give you.
                </P>
                <P>
                    Mentors, on the other hand, are certified coaches with experience in higher categories. They are here to guide you through the
                    next steps, help you navigate the training process, and support you as you grow your coaching identity. Whether you’re still
                    hesitating or already preparing your registration, these conversations are your opportunity to ask questions, gain clarity, and
                    feel supported by people who believe in you. Coaching starts with connection — and your journey starts here.
                </P>
            </div>
        </div>
    </AppLayout>
</template>
