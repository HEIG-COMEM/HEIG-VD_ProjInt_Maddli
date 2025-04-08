<script setup lang="ts">
import SectionLayout from '@/components/SectionLayout.vue';
import { H2 } from '@/components/typography/headings';
import { Blockquote, P, Small } from '@/components/typography/texts';
import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import WebLayout from '@/layouts/WebLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Help Starter Pack"></Head>

    <WebLayout>
        <SectionLayout background="bg-accent" textColor="text-accent-foreground" padding="p-8 md:p-16" class="dark:bg-accent/20 dark:text-foreground">
            <div class="flex flex-col items-center gap-4 text-center md:py-16">
                <h1 class="text-5xl font-bold sm:text-7xl md:text-8xl lg:text-9xl">
                    <span class="text-[#FFB700]">H</span>elp <span class="text-[#FFB700]">S</span>tarter <span class="text-[#FFB700]">P</span>ack
                </h1>
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
                            <TableHead>Licence</TableHead>
                            <TableHead>Minimum age</TableHead>
                            <TableHead>Duration</TableHead>
                            <TableHead>Prerequisites</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody class="text-left">
                        <TableRow>
                            <TableCell>ASF C Basic</TableCell>
                            <TableCell>17 Y/o</TableCell>
                            <TableCell>6 days (2 x 3d)</TableCell>
                            <TableCell>none</TableCell>
                        </TableRow>
                        <TableRow>
                            <TableCell>UEFA C</TableCell>
                            <TableCell>18 Y/o</TableCell>
                            <TableCell>6 days (2 x 3d)</TableCell>
                            <TableCell>C Basic confirmed</TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </div>
        </SectionLayout>
    </WebLayout>
</template>
