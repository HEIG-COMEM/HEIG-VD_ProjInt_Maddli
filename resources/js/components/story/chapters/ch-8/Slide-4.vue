<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';

const bg = '#006565';
</script>

<template>
    <section data-auto-animate :data-background-color="bg" class="relative h-full py-16">
        <div class="flex h-full flex-row justify-between">
            <div class="mb-auto flex flex-col items-start justify-center gap-2 font-baloo text-white md:gap-8">
                <h1 class="max-w-sm text-left text-xl font-bold sm:text-2xl md:text-3xl lg:text-6xl">Hello Coach Simulation</h1>
                <div data-id="lead" class="text-left text-lg sm:text-xl md:text-2xl lg:text-3xl">Great job coach!</div>
            </div>
            <Character
                type="coach"
                :scale="0.2"
                :poseNumber="4"
                :chNumber="8"
                class="!-top-[20%] !left-[20%] md:!left-[28%] xl:!left-[35%] xl:!top-[40%] 2xl:!left-[40%] 2xl:!top-[35%]"
            />
            <div class="flex h-fit w-1/2 flex-col gap-3 self-center rounded-md bg-white p-3 font-baloo lg:gap-6 lg:p-12">
                <p class="text-lg font-bold lg:text-3xl">What’s next ?</p>
                <div class="flex h-full w-full flex-row items-center justify-between gap-4">
                    <div class="flex w-1/2 flex-col justify-around gap-2 lg:gap-4">
                        <p class="text-sm font-bold lg:text-xl">Need help getting started ?</p>
                        <p class="text-xs lg:text-lg">Explore our Help Starter Pack for clear guidance on how to get your coach licence.</p>
                        <a
                            :href="route('hsp')"
                            class="mt-6 w-fit cursor-pointer self-center rounded-md bg-[#006565] px-2 py-1 text-xs text-white lg:px-4 lg:py-2 lg:text-base"
                            >Explore our Help Starter Pack</a
                        >
                    </div>
                    <div class="mx-auto h-52 w-px bg-black"></div>
                    <div class="flex w-1/2 flex-col gap-2 lg:gap-4">
                        <p class="text-sm font-bold lg:text-xl">Join the community</p>
                        <p class="text-xs lg:text-lg">
                            Connect with active women coaches, ask your questions, and get inspired inside the Hello Coach Club.
                        </p>
                        <a
                            :href="route('club.infos')"
                            class="mt-6 w-fit cursor-pointer self-center rounded-md bg-[#006565] px-2 py-1 text-xs text-white lg:px-4 lg:py-2 lg:text-base"
                            >Join the Hello Coach Club</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
