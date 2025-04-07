<script setup lang="ts">
import { H2 } from '@/components/typography/headings';
import { P } from '@/components/typography/texts';
import { Button } from '@/components/ui/button';
import WebLayout from '@/layouts/WebLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ArrowRight, Play, PlayCircle } from 'lucide-vue-next';
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
        <div class="relative h-screen w-screen bg-accent p-8 sm:p-16">
            <div class="absolute inset-0 top-16 z-10 flex h-full w-full flex-col items-center justify-center px-4 text-white sm:px-8">
                <div class="mb-12 w-full text-center sm:mb-24 sm:text-left">
                    <h1 class="text-3xl font-bold sm:text-5xl md:text-6xl lg:text-7xl">Become a coach</h1>
                    <p class="mt-4 text-base sm:text-lg md:text-xl lg:text-2xl">Welcome to the Hello Coach Simulation!</p>
                </div>
                <div class="flex w-full flex-col gap-8 sm:flex-row sm:gap-12">
                    <div class="flex w-full flex-col items-center justify-center gap-4 sm:w-1/2 sm:items-start">
                        <div class="flex flex-col gap-4 sm:flex-row">
                            <a
                                href="https://www.nds.baspo.admin.ch/publicArea/cadreEducationStructure/cadre/education-structure/8046830102593708144/schedule?CadreEducationCourse_jsCoursePlan=%7B%22filterDefinition%22:%7B%22cadreEducationCourseType%22:%7B%22value%22:%22-2317626998746428607%22,%22label%22:%22Leiterkurs%22%7D%7D%7D&lang=fr"
                            >
                                <Button size="lg" class="bg-accent text-accent-foreground hover:text-primary-foreground"
                                    >Register to the C Licence <ArrowRight
                                /></Button>
                            </a>
                            <Button size="lg" variant="secondary">Explore Program</Button>
                        </div>
                        <P class="rounded-md bg-white/10 p-4 text-center sm:p-8 sm:text-left">
                            Join over 1,000+ certified coaches all around Europe who started their journey with us. FIFA-recognized certification
                            program with career opportunities worldwide.
                        </P>
                    </div>
                    <div class="h-full w-full rounded-md bg-accent p-4 sm:w-1/2 sm:p-8">
                        <div class="flex flex-row items-center gap-4">
                            <PlayCircle class="h-10 w-10 sm:h-12 sm:w-12" />
                            <div>
                                <H2 class="text-lg sm:text-xl">Hello Coach vidéo</H2>
                                <P class="!mt-0 text-sm sm:text-base">Discover the Hello Coach</P>
                            </div>
                        </div>
                        <div class="relative mt-4 h-auto w-full">
                            <video
                                ref="videoPlayer"
                                poster="/assets/images/home-hero-video-poster.png"
                                preload="auto"
                                src="https://storage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4"
                                class="h-auto w-full rounded-md"
                                @play="isPlaying = true"
                                :controls="isPlaying ? true : false"
                            ></video>
                            <div v-if="!isPlaying" class="absolute inset-0" @click="playVideo()">
                                <div class="flex h-full w-full items-center justify-center rounded-md bg-black/30">
                                    <Play class="h-12 w-12 cursor-pointer text-white sm:h-16 sm:w-16" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute inset-0 h-full w-full">
                <img src="/assets/images/home-hero-bg.png" alt="Background" class="h-full w-full object-cover" />
                <div class="absolute inset-0 z-0 bg-black opacity-50"></div>
            </div>
        </div>
        <div class="h-screen w-screen bg-primary"></div>
    </WebLayout>
</template>
