<script setup lang="ts">
import FeatureNumberCard from '@/components/FeatureNumberCard.vue';
import HSPSection from '@/components/HSPSection.vue';
import SectionLayout from '@/components/SectionLayout.vue';
import { H2 } from '@/components/typography/headings';
import { Blockquote, P, Small } from '@/components/typography/texts';
import { Button } from '@/components/ui/button';
import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import WebLayout from '@/layouts/WebLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ExternalLink, GraduationCap, MessageCircleQuestion, Share2 } from 'lucide-vue-next';
</script>

<template>
    <Head title="Help Starter Pack"></Head>

    <WebLayout>
        <SectionLayout background="bg-accent" textColor="text-accent-foreground" padding="p-8 md:p-16" class="dark:bg-accent/20 dark:text-foreground">
            <div class="flex flex-col items-center gap-4 text-center md:py-16">
                <h1 class="text-5xl font-bold sm:text-7xl md:text-8xl lg:text-9xl">Help Starter Pack</h1>
                <P class="mt-4 text-pretty text-base sm:text-lg md:text-xl lg:text-2xl">Here is how you can start your coaching journey</P>
            </div>
        </SectionLayout>

        <SectionLayout>
            <div class="flex flex-col items-center gap-6">
                <Small class="text-accent">Help Starter Pack – Switzerland</Small>
                <H2>Your guide to becoming a football coach in Switzerland</H2>
                <P class="!mt-0 text-pretty text-center">
                    Welcome to the Help Starter Pack – a guide designed to help you take your first steps as a football coach. Inside, you’ll find
                    practical info, useful resources, inspiring stories, and everything you need to get started with confidence.
                </P>
                <Blockquote class="text-pretty border-accent bg-accent/20 p-4">
                    <P class="text-left font-bold">
                        “I never thought I could become a coach. Today, I help a dozen young girls believe in themselves.”
                    </P>
                    <Small class="mt-4 not-italic">— Sandra, coach in Switzerland</Small>
                </Blockquote>
            </div>
        </SectionLayout>

        <SectionLayout background="bg-accent" textColor="text-accent-foreground">
            <div class="flex flex-col items-center justify-center gap-6">
                <H2>What does it mean to be a coach?</H2>
                <P class="text-pretty text-center !text-accent-foreground">
                    Being a coach is much more than giving instructions. It's about guiding a team, sharing values, creating a safe environment, and
                    helping every player grow.
                </P>
                <div class="mt-12 grid w-full grid-cols-1 gap-8 md:grid-cols-2">
                    <div class="flex flex-row items-center justify-start gap-4 rounded-lg bg-background p-4 text-foreground">
                        <span class="h-2 w-2 rounded-full bg-[#FFB700] dark:bg-[#006565]"></span>
                        <P class="!mt-0">Planning and leading training sessions</P>
                    </div>
                    <div class="flex flex-row items-center justify-start gap-4 rounded-lg bg-background p-4 text-foreground">
                        <span class="h-2 w-2 rounded-full bg-[#FFB700] dark:bg-[#006565]"></span>
                        <P class="!mt-0">Supporting and guiding young players</P>
                    </div>
                    <div class="flex flex-row items-center justify-start gap-4 rounded-lg bg-background p-4 text-foreground">
                        <span class="h-2 w-2 rounded-full bg-[#FFB700] dark:bg-[#006565]"></span>
                        <P class="!mt-0">Managing matches and everyday situations</P>
                    </div>
                    <div class="flex flex-row items-center justify-start gap-4 rounded-lg bg-background p-4 text-foreground">
                        <span class="h-2 w-2 rounded-full bg-[#FFB700] dark:bg-[#006565]"></span>
                        <P class="!mt-0">Creating a positive and inclusive team dynamic</P>
                    </div>
                </div>
            </div>
        </SectionLayout>

        <SectionLayout>
            <div class="flex w-full flex-col items-center gap-6">
                <H2>How to become a coach in Switzerland</H2>
                <Table>
                    <TableCaption>Official Coaching Licences</TableCaption>
                    <TableHeader>
                        <TableRow>
                            <TableHead></TableHead>
                            <TableHead>Licence</TableHead>
                            <TableHead>Minimum age</TableHead>
                            <TableHead>Duration</TableHead>
                            <TableHead>Prerequisites</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody class="text-left">
                        <TableRow>
                            <TableCell width="1">
                                <a
                                    href="https://www.nds.baspo.admin.ch/publicArea/cadreEducationStructure/cadre/education-structure/8046830102593708144/schedule?CadreEducationCourse_jsCoursePlan=%7B%22filterDefinition%22:%7B%22cadreEducationCourseType%22:%7B%22value%22:%22-2317626998746428607%22,%22label%22:%22Leiterkurs%22%7D%7D%7D&lang=fr"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <Button size="icon" variant="ghost">
                                        <ExternalLink class="h-4 w-4" />
                                    </Button>
                                </a>
                            </TableCell>
                            <TableCell>ASF C Basic</TableCell>
                            <TableCell>17 Y/o</TableCell>
                            <TableCell>6 days (2 x 3d)</TableCell>
                            <TableCell>none</TableCell>
                        </TableRow>
                        <TableRow>
                            <TableCell width="1">
                                <a href="https://fr.uefa.com/development/coaches/uefa-coaching-licences/" target="_blank" rel="noopener noreferrer">
                                    <Button size="icon" variant="ghost">
                                        <ExternalLink class="h-4 w-4" />
                                    </Button>
                                </a>
                            </TableCell>
                            <TableCell>UEFA C</TableCell>
                            <TableCell>18 Y/o</TableCell>
                            <TableCell>6 days (2 x 3d)</TableCell>
                            <TableCell>C Basic confirmed</TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </div>
        </SectionLayout>

        <SectionLayout>
            <div class="flex flex-col items-center justify-center gap-6">
                <H2>Financial Aid</H2>
                <P class="text-pretty text-center">
                    You may be eligible for support through one of the options below, we encourage you to explore them and see what assistance is
                    available to you.
                </P>
                <div class="mt-12 flex flex-col justify-center gap-6 md:flex-row md:gap-8">
                    <FeatureNumberCard title="Your local club" :number="1">
                        <template #description>
                            <P class="!mt-0 text-lg">Which can often cover part of the training costs</P>
                        </template>
                    </FeatureNumberCard>
                    <FeatureNumberCard title="Jeunesse+Sport (J+S)" :number="2">
                        <template #description>
                            <a href="https://www.jugendundsport.ch/fr/" target="_blank" rel="noopener noreferrer" class="break-words">
                                <Button variant="link" class="!mt-0 whitespace-normal p-0 text-left text-lg font-normal">
                                    Learn more about the J+S program <ExternalLink class="ml-1 h-4 w-4" />
                                </Button>
                            </a>
                        </template>
                    </FeatureNumberCard>
                    <FeatureNumberCard title="Your town or canton" :number="3">
                        <template #description>
                            <P class="!mt-0 text-lg">Via sports or equality services</P>
                        </template>
                    </FeatureNumberCard>
                </div>
            </div>
        </SectionLayout>

        <SectionLayout>
            <div class="flex flex-col items-center justify-center gap-6">
                <H2>Want To Go Further?</H2>
                <HSPSection
                    class="mt-12"
                    title="Join The Hello Coach Club"
                    :features="[
                        { icon: Share2, title: 'Strong Community', description: 'You are part of the community ' },
                        { icon: GraduationCap, title: 'Ambassadors and mentors to support you', description: 'Get help from an active coach' },
                        {
                            icon: MessageCircleQuestion,
                            title: 'Ask them your questions directly',
                            description: 'Feedback adapted to your questions ',
                        },
                    ]"
                    buttonText="Join The Hello Coach Club"
                    :buttonLink="route('club.infos')"
                    imageSrc="/assets/images/HSP-cover-2.png"
                />
            </div>
        </SectionLayout>
    </WebLayout>
</template>
