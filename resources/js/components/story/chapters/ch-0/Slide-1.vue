<script setup lang="ts">
import Caption from '@/components/story/ui/Caption.vue';
import IntroOutro from '@/components/story/ui/IntroOutro.vue';
import { MoveDown, MoveLeft, MoveRight, MoveUp } from 'lucide-vue-next';
</script>

<template>
    <section data-background-color="#321C16">
        <IntroOutro type="intro" />
        <div class="relative flex h-full flex-col items-end">
            <div class="flex flex-col items-center justify-center gap-4">
                <div class="flex flex-col items-center justify-center gap-4">
                    <div>
                        <MoveUp class="h-16 w-16 rounded-md border-4 border-gray-400 p-2 text-gray-400" />
                    </div>
                    <div class="flex w-full items-center justify-center gap-4">
                        <MoveLeft class="h-16 w-16 rounded-md border-4 border-blue-500 p-2 text-blue-500" />
                        <MoveDown class="h-16 w-16 rounded-md border-4 border-gray-400 p-2 text-gray-400" />
                        <MoveRight class="h-16 w-16 rounded-md border-4 border-blue-500 p-2 text-blue-500" />
                    </div>
                </div>
                <Caption class="!static">
                    <p>Use your <span class="font-bold">keyboard arrows</span> to play ! Or tap with your <span class="font-bold">finger</span></p>
                </Caption>
            </div>
        </div>
    </section>
</template>
