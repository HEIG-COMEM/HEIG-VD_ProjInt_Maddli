import axios from 'axios';
import { reactive } from 'vue';

export const availableCoach = reactive({
    availableCoaches: [] as Array<{ value: string; label: string }>,
    isLoading: false,
    error: null as string | null,
    fetchAvailableCoaches: async () => {
        availableCoach.isLoading = true;
        availableCoach.error = null;
        try {
            const response = await axios.get(route('club.admin.api.available-coaches'));
            // Transform the response to include only the id and name
            availableCoach.availableCoaches = response.data.coaches.map((coach: any) => ({
                value: `${coach.id}`,
                label: coach.name,
            }));
        } catch (err: any) {
            availableCoach.error = err.message || 'Failed to fetch available coaches.';
        } finally {
            availableCoach.isLoading = false;
        }
    },
});
