import { reactive, shallowRef } from 'vue';

// Define color constants with their hex codes
const COLORS = {
    BROWN: '#321C16',
    GRAY: '#504D48',
    DARK_GREEN: '#1A240B',
    LIGHT_GREEN: '#384712',
    LIGHT_BROWN: '#5E2C02',
    RED: '#873035',
    BLUE: '#1E404A',
    WHITE: '#FFFFFF',
} as const;

// Define background image paths
const BACKGROUND_IMAGES = {
    IMG1: '/img1.png',
    IMG2: '/img2.png',
    IMG3: '/img3.png',
    IMG4: '/img4.png',
    IMG5: '/img5.png',
    IMG6: '/img6.png',
    IMG7: '/img7.png',
    IMG8: '/img8.png',
} as const;

// Define the structure of a Slide with a path and a component reference
interface Slide {
    path: string;
    component: ReturnType<typeof shallowRef>;
}

// Define the structure of the StoryStore with its properties and methods
interface StoryStore {
    subStories: Record<string, any>; // Holds sub-stories, indexed by a string key
    story: any[];
    choices: any[];
    slides: Slide[];
    currentSlideIndex: number;
    backgroundColor: string; // Global variable for background color
    backgroundImage: string; // Global variable for background image
    duration: string; // Add this new property

    addChoice(choice: any): void; // Method to add a choice to the choices array
    getChoices(): any[]; // Method to retrieve all choices
    initializeSlides(): void; // Method to initialize slide components
    getCurrentSlideIndex(): number; // Method to retrieve the current slide index
    updateCurrentSlideIndex(index: number): void; // Method to update the current slide index
    getCurrentSlideProgress(): number; // Method to retrieve the current slide progress
    getTotalSlides(): number; // Method to retrieve the total number of slides
    getCurrentSlide(): Slide; // Method to retrieve the current slide
    getAllChaptersFolders(): string[]; // Method to retrieve all chapters folders
    getAllChaptersFoldersNames(): string[]; // Method to retrieve all chapters folders
    getNumberOfSlidesInChapter(chapter: string): number; // Method to retrieve the number of slides in a chapter
    getNumberOfSlidesInEachChapter(): number[]; // Method to retrieve the number of slides in each chapter
    setBackground(background: keyof typeof COLORS | keyof typeof BACKGROUND_IMAGES): void; // Method to set the background using predefined values
    updateBackground(): void; // Method to update the DOM with current background settings
    getDuration(): string; // Add this new method signature
}

// Create a reactive StoryStore instance
export const storyStore = reactive<StoryStore>({
    subStories: {},
    story: [],
    choices: [],
    slides: [],
    currentSlideIndex: 0,
    backgroundColor: '', // Initialize empty background color
    backgroundImage: '', // Initialize empty background image
    duration: '', // Add this new property initialization

    // Method to add a choice to the choices array
    addChoice(choice: any) {
        this.choices.push(choice);
        console.log(`Added to store: ${choice}`);
        console.log(`Choices: ${this.choices}`);
    },

    // Method to retrieve all choices
    getChoices() {
        return this.choices;
    },

    // Method to retrieve the current slide index
    getCurrentSlideIndex() {
        return this.currentSlideIndex;
    },

    // Method to update the current slide index
    updateCurrentSlideIndex(index: number) {
        this.currentSlideIndex = index;
    },

    // Method to retrieve the total number of slides
    getTotalSlides() {
        return this.slides.length;
    },

    // Method to retrieve the current slide progress as a percentage
    getCurrentSlideProgress() {
        return parseFloat((((this.getCurrentSlideIndex() + 1) / this.getTotalSlides()) * 100).toFixed(2));
    },

    // Method to retrieve the current slide
    getCurrentSlide() {
        return this.slides[this.currentSlideIndex];
    },

    // Method to retrieve all unique chapter folders from slides
    getAllChaptersFolders() {
        return [...new Set(this.slides.map((slide) => slide.path.split('/').slice(-2, -1)[0]))];
    },

    // Method to retrieve all chapter folder names based on predefined mapping
    getAllChaptersFoldersNames() {
        const chapterNames = {
            'ch-0': 'Introduction',
            'ch-1': 'Chapter 1',
            'ch-2': 'Chapter 2',
            'ch-3': 'Chapter 3',
            'ch-4': 'Chapter 4',
            'ch-5': 'Chapter 5',
            'ch-6': 'Chapter 6',
            'ch-7': 'Conclusion',
        };
        return this.getAllChaptersFolders().map((folder) => chapterNames[folder as keyof typeof chapterNames]);
    },

    // Method to retrieve the number of slides in a specific chapter
    getNumberOfSlidesInChapter(chapter: string) {
        return this.slides.filter((slide) => slide.path.includes(`/${chapter}/`)).length;
    },

    // Method to retrieve the number of slides in each chapter
    getNumberOfSlidesInEachChapter() {
        return this.getAllChaptersFolders().map((chapter) => this.getNumberOfSlidesInChapter(chapter));
    },

    // Method to set the background using predefined values
    setBackground(background: keyof typeof COLORS | keyof typeof BACKGROUND_IMAGES) {
        if (background in COLORS) {
            this.backgroundColor = COLORS[background as keyof typeof COLORS];
            this.backgroundImage = '';
        } else if (background in BACKGROUND_IMAGES) {
            this.backgroundImage = BACKGROUND_IMAGES[background as keyof typeof BACKGROUND_IMAGES];
            this.backgroundColor = '';
        }
        this.updateBackground();
    },

    // Method to update the DOM with current background settings
    updateBackground() {
        const currentSlide = this.getCurrentSlide();
        if (currentSlide) {
            const slideElement = document.querySelector(`section[data-background-color], section[data-background-image]`);
            if (slideElement) {
                if (this.backgroundColor) {
                    slideElement.removeAttribute('data-background-image');
                    slideElement.setAttribute('data-background-color', this.backgroundColor);
                } else if (this.backgroundImage) {
                    slideElement.removeAttribute('data-background-color');
                    slideElement.setAttribute('data-background-image', this.backgroundImage);
                }
            }
        }
    },

    // Method to initialize slide components by importing and structuring them
    initializeSlides() {
        const modules = import.meta.glob('../components/story/chapters/ch-*/Slide-*.vue', { eager: true });

        this.slides = Object.entries(modules)
            .map(([path, module]) => ({
                path,
                component: shallowRef((module as { default: any }).default),
            }))
            .sort((a, b) => a.path.localeCompare(b.path));

        // Add this duration calculation
        const totalSeconds = this.getTotalSlides() * 7;
        if (totalSeconds < 60) {
            this.duration = `${totalSeconds} seconds`;
        } else if (totalSeconds < 3600) {
            const minutes = Math.floor(totalSeconds / 60);
            const seconds = totalSeconds % 60;
            this.duration = `${minutes} minute${minutes > 1 ? 's' : ''}${seconds > 0 ? ` and ${seconds} second${seconds > 1 ? 's' : ''}` : ''}`;
        } else {
            const hours = Math.floor(totalSeconds / 3600);
            const minutes = Math.floor((totalSeconds % 3600) / 60);
            this.duration = `${hours} hour${hours > 1 ? 's' : ''}${minutes > 0 ? ` and ${minutes} minute${minutes > 1 ? 's' : ''}` : ''}`;
        }

        this.setBackground('BROWN');
    },

    // Add this new method
    getDuration() {
        return this.duration;
    },
});
