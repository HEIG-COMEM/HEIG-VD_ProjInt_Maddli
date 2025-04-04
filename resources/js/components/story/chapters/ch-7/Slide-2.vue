<script setup lang="ts">
import Parent from '@/components/story/characters/Parent.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';
</script>

<template>
    <section data-auto-animate data-background-image="/assets/story/bg/8.png" class="h-full">
        <div class="relative flex h-full w-full flex-row justify-around">
            <div class="relative w-1/2"></div>
            <div class="relative w-1/2">
                <DialogBubble text="Well done coach ! It was a great game." tail-position="right" class="!-left-[80%] !top-[10%] xl:!-left-[40%]" />
                <Parent
                    :scale="0.2"
                    :poseNumber="2"
                    :chNumber="7"
                    class="!-top-1/2 !left-1/2 md:!-top-1/3 md:!left-1/2 lg:!left-1/2 lg:!top-[20%] lg:!scale-[0.7] xl:!scale-[0.8]"
                />
                <Parent
                    :scale="0.2"
                    :poseNumber="1"
                    :chNumber="7"
                    class="!-top-1/2 !left-0 md:!-top-1/3 md:!left-[10%] lg:!left-[10%] lg:!top-[20%] lg:!scale-[0.7] xl:!scale-[0.8]"
                />
            </div>
        </div>
    </section>
</template>
