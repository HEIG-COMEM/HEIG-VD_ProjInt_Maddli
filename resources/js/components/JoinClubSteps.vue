<script setup lang="ts">
import { Button } from '@/components/ui/button';

import { Stepper, StepperDescription, StepperItem, StepperSeparator, StepperTitle, StepperTrigger } from '@/components/ui/stepper';

const steps = [
    {
        step: 1,
        title: 'Create Your Account',
        description: 'Sign up through our Join Club section with your basic information',
    },
    {
        step: 2,
        title: 'Complete Your Profile',
        description: 'Tell us about your coaching status and experience level',
    },
    {
        step: 3,
        title: 'Get Connected',
        description: "We'll match you with an Ambassador or Mentor based on your profile",
    },
    {
        step: 4,
        title: 'Start Your Journey',
        description: 'Connect with your Ambassador or Mentor with a direct chat',
    },
];
</script>

<template>
    <Stepper orientation="vertical" class="mx-auto flex w-full max-w-md flex-col justify-start gap-10">
        <StepperItem
            v-for="step in steps"
            :key="step.step"
            v-slot="{ state }"
            class="relative flex w-full items-center gap-6 md:items-start"
            :step="step.step"
            :completed="true"
            :disabled="true"
        >
            <StepperSeparator
                v-if="step.step !== steps[steps.length - 1].step"
                class="absolute left-[18px] top-[38px] block h-[105%] w-0.5 shrink-0 rounded-full bg-muted !opacity-100 group-data-[state=completed]:bg-primary"
            />

            <StepperTrigger as-child>
                <Button
                    :variant="state === 'completed' || state === 'active' ? 'default' : 'outline'"
                    size="icon"
                    class="z-10 shrink-0 rounded-full !opacity-100"
                    :class="[state === 'active' && 'ring-2 ring-ring ring-offset-2 ring-offset-background']"
                >
                    <span>{{ step.step }}</span>
                </Button>
            </StepperTrigger>

            <div class="flex flex-col gap-1 text-left !opacity-100">
                <StepperTitle :class="[state === 'active' && 'text-primary']" class="text-sm font-semibold transition lg:text-base">
                    {{ step.title }}
                </StepperTitle>
                <StepperDescription
                    :class="[state === 'active' && 'text-primary']"
                    class="sr-only text-xs text-muted-foreground transition md:not-sr-only lg:text-sm"
                >
                    {{ step.description }}
                </StepperDescription>
            </div>
        </StepperItem>
    </Stepper>
</template>
