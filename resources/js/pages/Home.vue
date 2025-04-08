<script setup lang="ts">
import FeatureCard from '@/components/FeatureCard.vue';
import HSPSection from '@/components/HSPSection.vue';
import SectionLayout from '@/components/SectionLayout.vue';
import TestimonialCard from '@/components/TestimonialCard.vue';
import { H2 } from '@/components/typography/headings';
import { Lead, P } from '@/components/typography/texts';
import { Button } from '@/components/ui/button';
import WebLayout from '@/layouts/WebLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { BookOpen, ChartNoAxesColumnIncreasing, ClipboardCheck, KeyRound, Play, PlayCircle, Trophy, Users } from 'lucide-vue-next';
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
            class="flex w-screen flex-col items-center justify-center bg-accent p-8 sm:p-16"
            style="background: url('/assets/images/home-hero-bg.png') center/cover no-repeat"
        >
            <div class="flex max-w-screen-lg flex-col items-center justify-center gap-12 px-4 text-white sm:px-8">
                <div class="w-full text-center sm:mb-16 sm:text-left">
                    <h1 class="text-5xl font-bold sm:text-7xl md:text-8xl lg:text-9xl">Become a coach</h1>
                    <p class="mt-4 text-base sm:text-lg md:text-xl lg:text-2xl">Welcome to the Hello Coach Simulation!</p>
                </div>
                <div class="flex w-full flex-col gap-8 sm:gap-12 md:flex-row">
                    <div class="flex w-full flex-col items-center justify-end gap-6 md:w-1/2 md:items-start">
                        <Button size="lg" class="bg-accent text-accent-foreground hover:text-primary-foreground" @click="router.visit(route('hsp'))">
                            Explore our Help Starter Pack
                        </Button>

                        <P class="rounded-lg bg-white/10 p-4 text-center sm:p-8 sm:text-left">
                            Join over 1,000+ certified coaches all around Europe who started their journey with us. FIFA-recognized certification
                            program with career opportunities worldwide.
                        </P>
                    </div>
                    <div class="h-full w-full rounded-lg bg-accent p-4 text-accent-foreground sm:p-8 md:w-1/2">
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

        <SectionLayout>
            <div class="flex flex-col items-center justify-center gap-6">
                <H2>Interactive Coaching Simulation</H2>
                <Lead class="text-center">
                    Step into the shoes of a coach in this immersive decision-making simulation. Face challenges, make key choices, and see how your
                    leadership impacts the game!
                </Lead>
                <div class="relative w-full rounded-lg object-cover shadow-lg">
                    <img class="w-full rounded-lg object-cover shadow-lg" src="/assets/images/become-a-coach-poster.png" />
                    <Button
                        variant="default"
                        size="lg"
                        class="absolute bottom-8 left-1/2 -translate-x-1/2 translate-y-1/2 sm:bottom-12"
                        @click="router.visit(route('become-coach'))"
                    >
                        Play now !
                    </Button>
                </div>
            </div>
        </SectionLayout>

        <SectionLayout>
            <div class="flex flex-col items-center justify-center gap-6">
                <H2>Personal Growth Through Coaching</H2>
                <Lead class="text-center">Coaching is about constant growth and learning new abilities every day</Lead>
                <div class="mt-12 flex w-full flex-col justify-center gap-6 sm:flex-row sm:gap-8">
                    <FeatureCard title="Building Leadership" description="Develop your ability to inspire and guide a team" :icon="ClipboardCheck" />
                    <FeatureCard title="Community leader" description="Play a key role in your club and your community" :icon="Users" />
                    <FeatureCard
                        title="Inspire young women"
                        description="Become a role model for young women and ignite the passion for football"
                        :icon="Trophy"
                    />
                </div>
            </div>
        </SectionLayout>

        <SectionLayout>
            <div class="flex flex-col items-center justify-center gap-6">
                <H2>Success Stories from Our Coaches</H2>
                <div class="mt-12 flex flex-col justify-center gap-6 sm:flex-row sm:gap-8">
                    <TestimonialCard
                        name="Sarah Johnson"
                        title="Youth Team Coach"
                        description="The Club helped me become a coach and I am now leading my team with confidence and purpose."
                        profile-img-url="https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5"
                        :rating="4"
                    />
                    <TestimonialCard
                        name="Sarah Johnson"
                        title="New coach"
                        description="My Mentor has been invaluable to my development as a new coach."
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
        </SectionLayout>

        <SectionLayout background="bg-accent" textColor="text-accent-foreground" gap="gap-24 sm:gap-36" padding="px-8 py-16 sm:p-16">
            <div class="flex flex-col items-center justify-center gap-6">
                <H2>Ready to Elevate Your Coaching Journey?</H2>
                <Lead class="text-center !text-accent-foreground">
                    The Club is more than just a network, it's a structured support system for aspiring and beginner coaches. Whether you're just
                    starting or already coach, you'll be guided every step of the way.
                </Lead>
                <div
                    class="mt-12 flex w-full max-w-sm flex-col justify-between gap-4 rounded-lg bg-background p-6 text-center text-secondary-foreground shadow-lg lg:w-1/2"
                >
                    <P class="text-xl font-bold">The Hello Coach Club</P>
                    <P class="text-lg">Discover the club and everything it has to offer</P>
                    <Button
                        size="lg"
                        class="w-full bg-accent text-accent-foreground hover:text-primary-foreground"
                        @click="router.visit(route('club.home'))"
                    >
                        Discover The Club
                    </Button>
                </div>
            </div>
        </SectionLayout>

        <SectionLayout>
            <HSPSection
                class="mt-12"
                title="What's Included:"
                :features="[
                    { icon: BookOpen, title: 'Practical Coaching Tips', description: 'Actionable strategies to improve team management' },
                    { icon: KeyRound, title: 'Exclusive Resources', description: 'Access to ambassador and mentorship' },
                    { icon: ChartNoAxesColumnIncreasing, title: 'Step-by-Step Guides', description: 'Structured advice to help you' },
                ]"
                buttonText="Get Started with HSP"
                :buttonLink="route('hsp')"
                imageSrc="/assets/images/HSP-cover.png"
            />
        </SectionLayout>
    </WebLayout>
</template>
