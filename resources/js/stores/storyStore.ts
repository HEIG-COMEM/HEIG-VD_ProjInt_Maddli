import { reactive, shallowRef } from 'vue';

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

    addChoice(choice: any): void; // Method to add a choice to the choices array
    getChoices(): any[]; // Method to retrieve all choices
    initializeSlides(): void; // Method to initialize slide components
}

// Create a reactive StoryStore instance
export const storyStore = reactive<StoryStore>({
    subStories: {},
    story: [],
    choices: [],
    slides: [],

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

    // Method to initialize slide components
    initializeSlides() {
        // Automatically import all slide components from specified path
        const modules = import.meta.glob('../components/story/chapters/ch-*/Slide-*.vue', { eager: true });

        // Transform the imported modules into a structured format for slides
        this.slides = Object.entries(modules)
            .map(([path, module]) => ({
                path, // Store the path of the slide
                component: shallowRef((module as { default: any }).default), // Store the component reference
            }))
            // Sort slides by path to ensure a consistent order
            .sort((a, b) => a.path.localeCompare(b.path));
    },
});
