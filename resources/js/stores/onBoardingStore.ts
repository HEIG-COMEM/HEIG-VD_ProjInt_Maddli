import { reactive } from 'vue';

const LOCAL_STORAGE_KEY = 'onBoardingStep';

export const onBoardingStore = reactive({
    currentStep: Number(localStorage.getItem(LOCAL_STORAGE_KEY)) || 0,

    setStep(step: number) {
        this.currentStep = step;
        localStorage.setItem(LOCAL_STORAGE_KEY, step.toString());
    },

    nextStep() {
        this.setStep(this.currentStep + 1);
    },

    previousStep() {
        this.setStep(this.currentStep - 1);
    },
});
