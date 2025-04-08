<script setup lang="ts">
import FeatureCard from '@/components/FeatureCard.vue';
import JoinClubSteps from '@/components/JoinClubSteps.vue';
import PlanCard from '@/components/PlanCard.vue';
import SectionLayout from '@/components/SectionLayout.vue';
import { H2 } from '@/components/typography/headings';
import { Lead } from '@/components/typography/texts';
import { Button } from '@/components/ui/button';
import WebLayout from '@/layouts/WebLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { GraduationCap, HeartHandshake, KeyRound, Link, Share2 } from 'lucide-vue-next';
</script>

<template>
    <Head title="Club"></Head>
    <WebLayout>
        <div
            class="flex w-screen flex-col items-center justify-center bg-accent p-8 md:h-screen md:p-16"
            style="background: url('/assets/images/home-hero-bg.png') center/cover no-repeat"
        >
            <div class="flex max-w-screen-xl flex-col items-center justify-center gap-8 px-4 text-white md:items-start md:px-8">
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

        <SectionLayout>
            <div class="flex w-full flex-col items-center gap-6">
                <H2>Choose Your Path</H2>
                <Lead class="text-pretty text-center">
                    Whether you're just starting or already licensed, we have the perfect support system for you.
                </Lead>
                <div class="mt-12 flex w-full flex-col justify-center gap-8 md:gap-12 lg:flex-row">
                    <PlanCard
                        title="Future Coaches"
                        description="Perfect for those who haven't obtained their UEFA C License yet. Get paired with an Ambassador who will guide you through your first steps."
                        :features="['Personal Ambassador support', 'Initial coaching support', 'Networking opportunities']"
                        button-text="Connect with an Ambassador"
                        button-route="club.home"
                        :icon="HeartHandshake"
                    />
                    <PlanCard
                        title="Licensed Coaches"
                        description="For coaches with a UEFA C License. Get matched with a Marraine (Mentor) for professional guidance and support."
                        :features="['Experienced Mentor matching', 'Possibility to guide futur coaches', 'Networking opportunities']"
                        button-text="Find Your Mentor"
                        button-route="club.home"
                        :icon="KeyRound"
                    />
                </div>
            </div>
        </SectionLayout>

        <SectionLayout>
            <div class="flex w-full flex-col items-center gap-6">
                <H2>Why Join the Club?</H2>
                <div class="mt-12 flex flex-col justify-center gap-6 md:flex-row md:gap-8">
                    <FeatureCard class="!w-full" title="Strong Community" description="Connect with Ambassador or Mentor" :icon="Share2" />
                    <FeatureCard
                        class="!w-full"
                        title="Professional Growth"
                        description="Build your career with expert guidance and opportunities"
                        :icon="GraduationCap"
                    />
                    <FeatureCard class="!w-full" title="Link" description="Build your career with expert guidance and opportunities" :icon="Link" />
                </div>
            </div>
        </SectionLayout>

        <SectionLayout>
            <div class="flex flex-col items-center gap-6">
                <H2>How to Join the Club</H2>
                <JoinClubSteps class="mt-12 w-fit" />
            </div>
        </SectionLayout>

        <SectionLayout background="bg-accent" textColor="text-accent-foreground">
            <div class="flex flex-col items-center gap-6">
                <H2>Ready to Start Your Coaching Journey?</H2>
                <Lead class="text-pretty text-center !text-accent-foreground">
                    Join our community of coaches and take the first step towards your coaching career.
                </Lead>
                <Button @click="router.visit(route('club.home'))"> Join the Club Now </Button>
            </div>
        </SectionLayout>
    </WebLayout>
</template>
