<script setup lang="ts">
import FeatureCard from '@/components/FeatureCard.vue';
import JoinClubSteps from '@/components/JoinClubSteps.vue';
import PlanCard from '@/components/PlanCard.vue';
import { H2 } from '@/components/typography/headings';
import { Lead } from '@/components/typography/texts';
import { Button } from '@/components/ui/button';
import WebLayout from '@/layouts/WebLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { BookOpen, GraduationCap, HeartHandshake, KeyRound, Link, Share2 } from 'lucide-vue-next';
</script>

<template>
    <Head title="Club"></Head>
    <WebLayout>
        <div
            class="flex w-screen flex-col justify-center bg-accent p-8 md:h-screen md:p-16"
            style="background: url('/assets/images/home-hero-bg.png') center/cover no-repeat"
        >
            <div class="flex flex-col items-center justify-center gap-8 px-4 text-white md:items-start md:px-8">
                <div class="flex flex-col items-center gap-4 text-center md:mb-16 md:items-start md:text-left">
                    <h1 class="text-3xl font-bold sm:text-5xl md:text-6xl lg:text-7xl">Join The Club and the community</h1>
                    <p class="mt-4 text-base sm:text-lg md:text-xl lg:text-2xl">Join the community of female coaches transforming women's football</p>
                    <Button
                        @click="router.visit(route('club.home'))"
                        size="lg"
                        class="w-fit bg-accent text-accent-foreground hover:text-primary-foreground"
                    >
                        Join the community
                    </Button>
                </div>
            </div>
        </div>
        <div class="flex w-screen flex-col gap-16 bg-background px-8 py-16 text-center text-foreground md:gap-24 md:p-16">
            <div class="flex flex-col items-center gap-6">
                <H2>Choose Your Path</H2>
                <Lead class="max-w-2xl text-pretty">
                    Whether you're just starting or already licensed, we have the perfect support system for you.
                </Lead>
                <div class="flex flex-col justify-center gap-8 md:gap-12 lg:w-2/3 lg:flex-row">
                    <PlanCard
                        title="Future Coaches"
                        description="Perfect for those who haven't obtained their UEFA C License yet. Get paired with an Ambassador who will guide you through your first steps."
                        :features="[
                            'Personal Ambassador support',
                            'Initial coaching guidance',
                            'License preparation help',
                            'Networking opportunities',
                        ]"
                        button-text="Connect with an Ambassador"
                        button-route="club.home"
                        :icon="HeartHandshake"
                    />
                    <PlanCard
                        title="Licensed Coaches"
                        description="For coaches with a UEFA C License. Get matched with a Marraine (Mentor) for professional guidance and support."
                        :features="[
                            'Experienced Mentor matching',
                            'Advanced coaching support',
                            'Professional development',
                            'Networking opportunities',
                        ]"
                        button-text="Find Your Mentor"
                        button-route="club.home"
                        :icon="KeyRound"
                    />
                </div>
            </div>
            <div class="flex flex-col items-center gap-6">
                <H2>Why Join the Club?</H2>
                <div class="flex flex-col justify-center gap-8 md:flex-row md:gap-12 lg:w-2/3">
                    <FeatureCard
                        class="!w-full md:!w-1/4"
                        title="Strong Community"
                        description="Connect with fellow coaches sharing similar goals"
                        :icon="Share2"
                    />
                    <FeatureCard class="!w-full md:!w-1/4" title="Exclusive Resources" description="Access specialized advice" :icon="BookOpen" />
                    <FeatureCard
                        class="!w-full md:!w-1/4"
                        title="Professional Growth"
                        description="Build your career with expert guidance and opportunities"
                        :icon="GraduationCap"
                    />
                    <FeatureCard
                        class="!w-full md:!w-1/4"
                        title="Link"
                        description="Build your career with expert guidance and opportunities"
                        :icon="Link"
                    />
                </div>
            </div>
            <div class="flex flex-col items-center gap-6">
                <H2>How to Join the Club</H2>
                <JoinClubSteps class="w-fit" />
            </div>
        </div>
        <div class="flex w-screen flex-col gap-16 bg-accent px-8 py-16 text-center text-accent-foreground sm:gap-24 sm:p-16">
            <div class="flex flex-col items-center gap-6">
                <H2>Ready to Start Your Coaching Journey?</H2>
                <Lead class="max-w-2xl text-pretty !text-accent-foreground">
                    Join our community of coaches and take the first step towards your coaching career.
                </Lead>
                <Button @click="router.visit(route('club.home'))"> Join the Club Now </Button>
            </div>
        </div>
    </WebLayout>
</template>
