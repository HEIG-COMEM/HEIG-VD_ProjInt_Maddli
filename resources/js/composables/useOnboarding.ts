import { onBoardingStore } from '@/stores/onBoardingStore';
import type { SharedData } from '@/types';
import { usePage } from '@inertiajs/vue3';
import { driver } from 'driver.js';
import 'driver.js/dist/driver.css';
import { computed } from 'vue';
import { toast } from 'vue-sonner';

export function useOnboarding(isMobile: boolean) {
    const page = usePage<SharedData>();
    const isNewUser = computed(() => !page.props.auth.roles.length);

    const driverObj = driver({
        showProgress: true,
        allowClose: false,
        popoverClass: 'theme',
        nextBtnText: 'Next',
        prevBtnText: 'Back',
        doneBtnText: 'Finish',
        onNextClick: () => {
            onBoardingStore.nextStep();
            driverObj.moveNext();
        },
        onPrevClick: () => {
            onBoardingStore.previousStep();
            driverObj.movePrevious();
        },
        steps: [
            {
                popover: {
                    title: 'Welcome to the CLUB',
                    description: 'Discover how to use the platform to its fullest!',
                    onNextClick: () => {
                        if (!isMobile) {
                            onBoardingStore.nextStep();
                            driverObj.moveNext();
                            return;
                        }

                        const button: HTMLElement | null = document.querySelector('button[data-sidebar="trigger"]');
                        if (!button) {
                            driverObj.destroy();
                            toast.error('Something went wrong...');
                            return;
                        }

                        button.click();
                        setTimeout(() => {
                            onBoardingStore.nextStep();
                            driverObj.moveNext();
                        }, 100);
                    },
                },
            },
            {
                element: 'div[data-sidebar="sidebar"] ul:nth-child(2)',
                popover: {
                    title: 'Sidebar',
                    description: 'Navigate through the platform using the sidebar.',
                },
            },
            {
                element: 'div[data-sidebar="sidebar"] ul:nth-child(2) li:nth-child(1)',
                popover: {
                    title: 'Home',
                    description: 'This is your home page. You can find all the information you need here.',
                },
            },
            {
                element: 'div[data-sidebar="sidebar"] ul:nth-child(2) li:nth-child(2)',
                popover: {
                    title: 'Lists',
                    description: 'Here you can find all the contacts you need to reach out to.',
                },
            },
            {
                element: 'div[data-sidebar="sidebar"] ul:nth-child(2) li:nth-child(3)',
                popover: {
                    title: 'Conversations',
                    description: 'This is where you can find all your conversations with other users.',
                },
            },
            {
                popover: {
                    title: 'First things first',
                    description: "Before you start using the platform, let's find your ambassador.",
                },
            },
            {
                popover: {
                    title: 'Lists',
                    description: "We'll go in the lists to find your ambassador.",
                    onNextClick: () => {
                        (document.querySelector('div[data-sidebar="sidebar"] ul:nth-child(2) li:nth-child(2) a') as HTMLElement)?.click();
                        onBoardingStore.nextStep();
                        driverObj.moveNext();
                    },
                },
            },
            {
                element: 'div[role="alert"] button',
                popover: {
                    title: 'Find your ambassador',
                    description: 'In the lists, you can find your ambassador. Click on the button.',
                    onNextClick: () => {
                        const popover: HTMLElement | null = document.querySelector('div[role="dialog"]');
                        if (popover && popover.dataset.state === 'open') {
                            onBoardingStore.nextStep();
                            driverObj.moveNext();
                        } else {
                            const button: HTMLElement | null = document.querySelector('div[role="alert"] button');
                            if (button) {
                                button.click();
                            }
                            setTimeout(() => {
                                onBoardingStore.nextStep();
                                driverObj.moveNext();
                            }, 100);
                        }
                    },
                },
            },
            {
                element: 'div[role="dialog"]',
                popover: {
                    title: 'Find your ambassador',
                    description: 'In here fill the form so we can find your best match ambassador.',
                },
                onHighlightStarted: () => {
                    window.addEventListener(
                        'click',
                        () => {
                            onBoardingStore.nextStep();
                            driverObj.moveNext();
                        },
                        { once: true },
                    );
                },
            },
        ],
    });

    const startOnboarding = () => {
        if (!onBoardingStore.currentStep && page.props.ziggy.location !== route('club.home')) return;
        if (!isNewUser.value) return;
        driverObj.drive(onBoardingStore.currentStep);
    };

    return {
        isNewUser,
        startOnboarding,
    };
}
