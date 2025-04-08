<script setup lang="ts">
import FeatureCard from '@/components/FeatureCard.vue';
import TestimonialCard from '@/components/TestimonialCard.vue';
import { H2 } from '@/components/typography/headings';
import { Lead, P } from '@/components/typography/texts';
import { Button } from '@/components/ui/button';
import WebLayout from '@/layouts/WebLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { ArrowRight, BookOpen, ChartNoAxesColumnIncreasing, ClipboardCheck, KeyRound, Play, PlayCircle, Trophy, Users } from 'lucide-vue-next';
import { ref } from 'vue';

const isPlaying = ref(false);
const videoPlayer = ref<HTMLVideoElement | null>(null);

const playVideo = () => {
    if (videoPlayer.value) {
        videoPlayer.value.play();
    }
};
</script>

<template>
    <Head title="Home"></Head>

    <WebLayout>
        <div
            class="flex w-screen flex-col justify-center bg-accent p-8 sm:p-16"
            style="background: url('/assets/images/home-hero-bg.png') center/cover no-repeat"
        >
            <div class="flex flex-col items-center justify-center gap-12 px-4 text-white sm:px-8">
                <div class="w-full text-center sm:mb-16 sm:text-left">
                    <h1 class="text-3xl font-bold sm:text-5xl md:text-6xl lg:text-7xl">Become a coach</h1>
                    <p class="mt-4 text-base sm:text-lg md:text-xl lg:text-2xl">Welcome to the Hello Coach Simulation!</p>
                </div>
                <div class="flex w-full flex-col gap-8 sm:gap-12 md:flex-row">
                    <div class="flex w-full flex-col items-center justify-center gap-6 md:w-1/2 md:items-start">
                        <div class="flex w-full flex-col flex-wrap gap-4 md:flex-row">
                            <a
                                href="https://www.nds.baspo.admin.ch/publicArea/cadreEducationStructure/cadre/education-structure/8046830102593708144/schedule?CadreEducationCourse_jsCoursePlan=%7B%22filterDefinition%22:%7B%22cadreEducationCourseType%22:%7B%22value%22:%22-2317626998746428607%22,%22label%22:%22Leiterkurs%22%7D%7D%7D&lang=fr"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="w-full lg:w-auto"
                            >
                                <Button size="lg" class="w-full bg-accent text-accent-foreground hover:text-primary-foreground">
                                    Register to the C Licence <ArrowRight />
                                </Button>
                            </a>
                            <Button size="lg" variant="secondary" class="w-full lg:w-auto">Explore Program</Button>
                        </div>
                        <P class="rounded-lg bg-white/10 p-4 text-center sm:p-8 sm:text-left">
                            Join over 1,000+ certified coaches all around Europe who started their journey with us. FIFA-recognized certification
                            program with career opportunities worldwide.
                        </P>
                    </div>
                    <div class="h-full w-full rounded-lg bg-accent p-4 sm:p-8 md:w-1/2">
                        <div class="flex flex-row items-center gap-4">
                            <PlayCircle class="h-10 w-10 sm:h-12 sm:w-12" />
                            <div>
                                <H2 class="!pb-0 text-lg sm:text-xl">Hello Coach vidéo</H2>
                                <P class="!mt-0 text-sm sm:text-base">Discover the Hello Coach</P>
                            </div>
                        </div>
                        <div class="relative mt-4 h-auto w-full">
                            <video
                                ref="videoPlayer"
                                poster="/assets/images/home-hero-video-poster.png"
                                preload="auto"
                                src="https://storage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4"
                                class="h-auto w-full rounded-lg"
                                @play="isPlaying = true"
                                :controls="isPlaying ? true : false"
                            ></video>
                            <div v-if="!isPlaying" class="absolute inset-0" @click="playVideo()">
                                <div class="flex h-full w-full items-center justify-center rounded-lg bg-black/30">
                                    <Play class="h-12 w-12 cursor-pointer text-white sm:h-16 sm:w-16" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex w-screen flex-col gap-24 bg-background px-8 pb-16 pt-48 text-center text-foreground sm:gap-36 sm:p-16">
            <div class="flex flex-col items-center justify-center gap-6">
                <H2>Interactive Coaching Simulation</H2>
                <Lead class="max-w-2xl">
                    Test your coaching skills in a real-time decision-making experience. Face challenges, make key choices, and see how your
                    leadership impacts the game!
                </Lead>
                <img class="w-full object-cover shadow-lg sm:w-2/3" src="/assets/images/become-a-coach-poster.png" />
            </div>
            <div class="flex flex-col items-center justify-center gap-6">
                <H2>Personal Growth Through Coaching</H2>
                <Lead class="max-w-2xl">Experience real-time decision-making and leadership challenges</Lead>
                <div class="mt-12 flex flex-col justify-center gap-6 sm:flex-row sm:gap-8">
                    <FeatureCard title="Building Leadership" description="Develop your ability to inspire and guide a team" :icon="ClipboardCheck" />
                    <FeatureCard
                        title="Managing Group Dynamics"
                        description="Learn how to handle different personalities and maintain team cohesion"
                        :icon="Users"
                    />
                    <FeatureCard
                        title="Adapting to Challenges"
                        description="Make key decisions under pressure and navigate unexpected situations"
                        :icon="Trophy"
                    />
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
        <div class="flex w-screen flex-col gap-24 bg-accent px-8 py-16 text-center text-accent-foreground sm:gap-36 sm:p-16">
            <div class="flex flex-col items-center justify-center gap-6">
                <H2>Ready to Elevate Your Coaching Journey?</H2>
                <Lead class="max-w-2xl !text-accent-foreground">
                    The Club is more than just a network, it's a structured support system for aspiring and beginner coaches. Whether you're just
                    starting or already coach, you'll be guided every step of the way.
                </Lead>
            </div>
        </div>
        <div class="flex w-screen flex-col items-center gap-12 bg-background px-8 py-16 text-center text-foreground sm:gap-12 sm:p-16">
            <div class="flex flex-col items-center justify-center gap-16">
                <div>
                    <H2>Help Starter Pack (HSP)</H2>
                    <Lead class="mt-4 max-w-2xl !text-accent-foreground">
                        Your ultimate guide to kick-start your coaching career! The Help Starter Pack provides essential tools, insights, and
                        strategies to build a strong foundation in coaching.
                    </Lead>
                </div>
                <div class="flex w-full flex-col justify-center gap-8 md:flex-row">
                    <div
                        class="flex aspect-video w-full flex-col justify-between gap-4 rounded-lg bg-secondary/30 p-6 text-center text-secondary-foreground shadow-lg sm:w-1/4"
                    >
                        <P class="text-xl font-bold">Existing Members</P>
                        <P class="text-lg">Access your club dashboard and chat with your mentors</P>
                        <Button size="lg" variant="secondary" @click="router.visit(route('club.home'))">Acess The Club</Button>
                    </div>
                    <div
                        class="flex aspect-video w-full flex-col justify-between gap-4 rounded-lg bg-secondary/30 p-6 text-center text-secondary-foreground shadow-lg sm:w-1/4"
                    >
                        <P class="text-xl font-bold">The official licence</P>
                        <P class="text-lg">Apply directly for the C licence to become a football coach</P>
                        <a
                            href="https://www.nds.baspo.admin.ch/publicArea/cadreEducationStructure/cadre/education-structure/8046830102593708144/schedule?CadreEducationCourse_jsCoursePlan=%7B%22filterDefinition%22:%7B%22cadreEducationCourseType%22:%7B%22value%22:%22-2317626998746428607%22,%22label%22:%22Leiterkurs%22%7D%7D%7D&lang=fr"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <Button size="lg" class="w-full bg-accent text-accent-foreground hover:text-primary-foreground">
                                Register to the C Licence <ArrowRight />
                            </Button>
                        </a>
                    </div>
                </div>
                <div
                    class="flex flex-col-reverse items-center justify-center gap-8 rounded-lg bg-secondary/30 p-4 text-secondary-foreground shadow-lg sm:w-2/3 sm:flex-row sm:gap-16 sm:p-8"
                >
                    <div class="flex w-full flex-col items-start gap-8 sm:w-1/2">
                        <P class="text-left text-xl font-bold">What's Included:</P>
                        <div class="flex flex-col gap-4">
                            <div class="flex flex-row items-center gap-4">
                                <BookOpen class="h-8 min-w-8 text-accent sm:h-10 sm:min-w-10" />
                                <div class="text-left">
                                    <P class="font-bold">Practical Coaching Tips</P>
                                    <P class="!mt-0">Actionable strategies to improve team management</P>
                                </div>
                            </div>
                            <div class="flex flex-row items-center gap-4">
                                <KeyRound class="h-8 min-w-8 text-accent sm:h-10 sm:min-w-10" />
                                <div class="text-left">
                                    <P class="font-bold">Exclusive Resources</P>
                                    <P class="!mt-0">Access to ambassador and mentorship</P>
                                </div>
                            </div>
                            <div class="flex flex-row items-center gap-4">
                                <ChartNoAxesColumnIncreasing class="h-8 min-w-8 text-accent sm:h-10 sm:min-w-10" />
                                <div class="text-left">
                                    <P class="font-bold">Step-by-Step Guides</P>
                                    <P class="!mt-0">Structured advice to help you</P>
                                </div>
                            </div>
                        </div>
                        <a :href="route('hsp')" class="w-full sm:w-fit">
                            <Button size="lg" class="w-full bg-accent text-accent-foreground hover:text-primary-foreground">
                                Get Started with HSP
                            </Button>
                        </a>
                    </div>
                    <img class="w-full rounded-lg object-cover sm:w-1/2" src="/assets/images/HSP-cover.png" />
                </div>
            </div>
        </div>
    </WebLayout>
</template>
