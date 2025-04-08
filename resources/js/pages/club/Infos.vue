<script setup lang="ts">
import FeatureCard from '@/components/FeatureCard.vue';
import PlanCard from '@/components/PlanCard.vue';
import TestimonialCard from '@/components/TestimonialCard.vue';
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
        <div class="relative h-screen w-screen bg-accent p-8 sm:p-16">
            <div class="absolute inset-0 top-16 z-10 flex flex-col items-center justify-center gap-12 px-4 text-white sm:items-start sm:px-8">
                <div class="flex flex-col gap-4 text-center sm:mb-16 sm:text-left">
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
            <img src="/assets/images/home-hero-bg.png" alt="Background" class="absolute inset-0 h-full w-full object-cover" />
            <div class="absolute inset-0 z-0 bg-black opacity-50"></div>
        </div>
        <div class="flex w-screen flex-col gap-24 bg-background px-8 pb-16 pt-48 text-center text-foreground sm:gap-36 sm:p-16">
            <div class="flex flex-col items-center justify-center gap-6">
                <H2>Choose Your Path</H2>
                <Lead class="max-w-2xl"> Whether you're just starting or already licensed, we have the perfect support system for you. </Lead>
                <div class="flex w-2/3 flex-col justify-center gap-6 sm:flex-row sm:gap-8">
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
            <div class="flex flex-col items-center justify-center gap-6">
                <H2>Why Join the Club ?</H2>
                <div class="mt-12 flex flex-col justify-center gap-6 sm:flex-row sm:gap-8">
                    <FeatureCard title="Strong Community" description="Connect with fellow coaches sharing similar goals" :icon="Share2" />
                    <FeatureCard title="Exclusive Resources" description="Access specialized advices" :icon="BookOpen" />
                    <FeatureCard
                        title="Professional Growth"
                        description="Build your career with expert guidance and opportunities"
                        :icon="GraduationCap"
                    />
                    <FeatureCard title="Link" description="Build your career with expert guidance and opportunities" :icon="Link" />
                </div>
            </div>
            <div class="flex flex-col items-center justify-center gap-6">
                <H2>Success Stories from Our Coaches</H2>
                <div class="mt-12 flex flex-col justify-center gap-6 sm:flex-row sm:gap-8">
                    <TestimonialCard
                        name="Sarah Johnson"
                        title="Youth Team Coach"
                        description="The certification program transformed my approach to coaching. I now lead with confidence and purpose."
                        profile-img-url="https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5"
                        :rating="4"
                    />
                    <TestimonialCard
                        name="Sarah Johnson"
                        title="New coach"
                        description="The mentorship provided were invaluable to my development as a new coach."
                        profile-img-url="https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5"
                        :rating="5"
                    />
                    <TestimonialCard
                        name="Emma Thompson"
                        title="Academy Director"
                        description="This program opened doors I never thought possible. Now I'm leading a successful academy."
                        profile-img-url="https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5"
                        :rating="4"
                    />
                </div>
            </div>
        </div>
    </WebLayout>
</template>
