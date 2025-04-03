<script setup lang="ts">
import TheCoach from '@/components/story/characters/TheCoach.vue';
</script>

<template>
    <section data-auto-animate data-background-color="#321C16" class="relative h-full">
        <div class="flex h-full flex-row justify-between">
            <div class="mb-auto flex flex-col items-start justify-center gap-8 text-white">
                <h1 class="max-w-sm text-left font-baloo text-6xl font-bold">Hello Coach Simulation</h1>
                <div data-id="lead" class="text-left font-baloo text-3xl">Great job coach!</div>
            </div>
            <TheCoach :scale="1.2" :poseNumber="4" :chNumber="8" class="!-bottom-2/3 !left-1/3 xl:!left-1/3" />
            <div class="flex h-fit w-1/2 flex-col gap-6 self-center rounded-md bg-white p-12 font-baloo">
                <p class="text-3xl font-bold">What’s next ?</p>
                <div class="flex h-full w-full flex-row items-center justify-between gap-4">
                    <div class="flex w-1/2 flex-col justify-around gap-4">
                        <p class="text-xl font-bold">Need help getting started ?</p>
                        <p class="text-lg">Explore our Help Starter Pack for clear guidance on how to get your coach licence.</p>
                        <!-- TODO: Link to HSP using ziggy route() -->
                        <a href="/" class="mt-6 w-fit cursor-pointer self-center rounded-md bg-[#321C16] px-4 py-2 text-white"
                            >Explore our Help Starter Pack</a
                        >
                    </div>
                    <div class="mx-auto h-52 w-px bg-black"></div>
                    <div class="flex w-1/2 flex-col gap-4">
                        <p class="text-xl font-bold">Join the community</p>
                        <p class="text-lg">Connect with active women coaches, ask your questions, and get inspired inside the Hello Coach Club.</p>
                        <a :href="route('club.home')" class="mt-6 w-fit cursor-pointer self-center rounded-md bg-[#321C16] px-4 py-2 text-white"
                            >Join the Hello Coach Club</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
