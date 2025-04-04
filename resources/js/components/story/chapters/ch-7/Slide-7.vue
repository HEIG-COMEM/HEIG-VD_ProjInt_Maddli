<script setup lang="ts">
import Parent from '@/components/story/characters/Parent.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';
</script>

<template>
    <section data-auto-animate data-background-image="/assets/story/bg/8.png" class="h-full">
        <div class="relative flex h-full w-full flex-row justify-around">
            <div class="relative w-1/2">
                <Parent
                    :scale="0.2"
                    :poseNumber="5"
                    :chNumber="7"
                    class="!-top-1/3 !left-0 md:!-top-1/3 md:!left-[10%] lg:!left-[10%] lg:!top-[20%] lg:!scale-[0.7] xl:!scale-[0.8]"
                />
            </div>
            <div class="relative w-1/2">
                <DialogBubble
                    text="Thanks, coach! It’s great to hear that. By the way, Lily loves to come to training."
                    tail-position="right"
                    class="!-left-[60%] !-top-[10%] !max-w-xs xl:!-left-[40%]"
                />
                <Parent
                    :scale="0.2"
                    :poseNumber="6"
                    :chNumber="7"
                    class="!-top-1/2 !left-0 md:!-top-1/3 md:!left-[10%] lg:!left-[10%] lg:!top-[20%] lg:!scale-[0.7] xl:!scale-[0.8]"
                />
            </div>
        </div>
    </section>
</template>
