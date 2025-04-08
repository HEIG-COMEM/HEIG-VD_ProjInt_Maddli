import { reactive, shallowRef } from 'vue';

// Define the structure of a Slide with a path and a component reference
interface Slide {
    path: string;
    component: ReturnType<typeof shallowRef>;
}

// Define the structure of the storyUtils with its properties and methods
interface storyUtils {
    subStories: Record<string, any>; // Holds sub-stories, indexed by a string key
    story: any[];
    choices: any[];
    slides: Slide[];
    currentSlideIndex: number;
    duration: string;

    addChoice(choice: any): void; // Method to add a choice to the choices array
    getChoices(): any[]; // Method to retrieve all choices
    initializeSlides(): void; // Method to initialize slide components
    getCurrentSlideIndex(): number; // Method to retrieve the current slide index
    updateCurrentSlideIndex(index: number): void; // Method to update the current slide index
    getCurrentSlideProgress(): number; // Method to retrieve the current slide progress
    getTotalSlides(): number; // Method to retrieve the total number of slides
    getCurrentSlide(): Slide; // Method to retrieve the current slide
    getAllChaptersFolders(): string[]; // Method to retrieve all chapters folders
    getChapterName(): string[]; // Method to retrieve all chapters folders
    getNumberOfSlidesInChapter(chapter: string): number; // Method to retrieve the number of slides in a chapter
    getNumberOfSlidesInEachChapter(): number[]; // Method to retrieve the number of slides in each chapter
    getDuration(): string; // Add this new method signature
    getChapterTitle(chapter: string): string; // Add this new method signature
}

// Create a reactive storyUtils instance
export const storyUtils = reactive<storyUtils>({
    subStories: {},
    story: [],
    choices: [],
    slides: [],
    currentSlideIndex: 0,
    duration: '',

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

    // Method to retrieve all chapter names based on predefined mapping
    getChapterName() {
        const chapterNames = {
            'ch-0': 'Introduction',
            'ch-1': 'Chapter 1',
            'ch-2': 'Chapter 2',
            'ch-3': 'Chapter 3',
            'ch-4': 'Chapter 4',
            'ch-5': 'Chapter 5',
            'ch-6': 'Chapter 6',
            'ch-7': 'Chapter 7',
            'ch-8': 'Conclusion',
        };
        return this.getAllChaptersFolders().map((folder) => chapterNames[folder as keyof typeof chapterNames]);
    },

    // Method to retrieve the title of a specific chapter
    getChapterTitle(chapter: string) {
        const chapterTitles = {
            'ch-0': 'Welcome',
            'ch-1': 'Squad call-up',
            'ch-2': 'Warm-up',
            'ch-3': 'First half',
            'ch-4': 'Half time',
            'ch-5': "Parent's complain",
            'ch-6': 'Changing room',
            'ch-7': 'Feedback',
            'ch-8': "What's next?",
        };
        return chapterTitles[chapter as keyof typeof chapterTitles] || '';
    },

    // Method to retrieve the number of slides in a specific chapter
    getNumberOfSlidesInChapter(chapter: string) {
        return this.slides.filter((slide) => slide.path.includes(`/${chapter}/`)).length;
    },

    // Method to retrieve the number of slides in each chapter
    getNumberOfSlidesInEachChapter() {
        return this.getAllChaptersFolders().map((chapter) => this.getNumberOfSlidesInChapter(chapter));
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

        // Calculate the total duration of the slides based on a fixed time per slide and format result
        const totalSeconds = this.getTotalSlides() * 7;
        if (totalSeconds < 60) {
            this.duration = `${totalSeconds} seconds`;
        } else if (totalSeconds < 3600) {
            const minutes = Math.round(totalSeconds / 60);
            this.duration = `~${minutes} minute${minutes > 1 ? 's' : ''}`;
        } else {
            const hours = Math.floor(totalSeconds / 3600);
            const minutes = Math.round((totalSeconds % 3600) / 60);
            this.duration = `${hours} hour${hours > 1 ? 's' : ''}${minutes > 0 ? ` and ~${minutes} minute${minutes > 1 ? 's' : ''}` : ''}`;
        }
    },

    // Method to retrieve the total duration of the slides
    getDuration() {
        return this.duration;
    },
});
