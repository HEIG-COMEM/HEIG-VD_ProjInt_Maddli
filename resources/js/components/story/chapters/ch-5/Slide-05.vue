<script setup lang="ts">
import Character from '@/components/story/characters/Character.vue';
import DialogBubble from '@/components/story/ui/DialogBubble.vue';

const bg = '/assets/story/bg/5-4.png';
</script>

<template>
    <section data-auto-animate :data-background-image="bg" class="h-full">
        <Character
            type="parent"
            :scale="0.2"
            :poseNumber="1"
            :chNumber="5"
            class="!-top-[15%] !left-[0%] md:!-top-[20%] md:!left-[5%] xl:!left-[10%] xl:!top-[35%] 2xl:!left-[10%]"
        />
        <Character
            type="parent"
            :scale="0.2"
            :poseNumber="2"
            :chNumber="5"
            class="!-top-[30%] !left-[15%] md:!-top-[35%] md:!left-[18%] xl:!left-[35%] xl:!top-[30%] 2xl:!left-[30%]"
        />
        <Character
            type="parent"
            :scale="0.2"
            :poseNumber="3"
            :chNumber="5"
            class="!-top-[20%] !left-[65%] md:!-top-[20%] md:!left-[70%] xl:!left-[85%] xl:!top-[30%] 2xl:!left-[80%]"
        />
        <DialogBubble
            tailPosition="right"
            class="!left-[53%] !top-0 !max-w-[10rem] md:!left-[51%] md:!max-w-[16rem] xl:!left-[60%] xl:!top-[3%] xl:!max-w-[16rem] 2xl:!left-[50%] 2xl:!top-[10%] 2xl:!max-w-sm"
            text="My daughter should get more playing time !!"
        />
    </section>
</template>
