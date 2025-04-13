<script setup lang="ts">
import InsightBox from '@/components/story/feedback/InsightBox.vue';

const bg = '#006565';
</script>

<template>
    <section data-auto-animate :data-background-color="bg" class="h-full py-12">
        <div class="flex h-full flex-col">
            <InsightBox title="Role model">
                <p>
                    As a coach, you represent more than just an authority figure on the field. Your players see you as a
                    <span class="font-bold">role model</span>, not only in your role as a coach, but also in the way you embody their values.
                </p>
                <p>
                    They see you as a <span class="font-bold">trustworthy</span> woman, a good listener, and capable of inspiring them. Sometimes,
                    they will seek your advice, even outside of the sporting context.
                </p>
                <p>
                    It's in these moments that you must combine teaching, listening, and empathy to guide them while maintaining your role as a coach.
                </p>
                <p>Remember that your players see you as a <span class="font-bold">strong and inspiring female figure.</span></p>
            </InsightBox>
        </div>
    </section>
</template>
