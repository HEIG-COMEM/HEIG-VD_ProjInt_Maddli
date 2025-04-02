import axios from 'axios';
import { reactive } from 'vue';

export const availableManager = reactive({
    availableManagers: [] as Array<{ value: string; label: string }>,
    isLoading: false,
    error: null as string | null,
    fetchAvailableManagers: async () => {
        availableManager.isLoading = true;
        availableManager.error = null;
        try {
            const response = await axios.get(route('club.admin.api.available-managers'));

            // Transform the response to include only the id and name
            availableManager.availableManagers = response.data.managers.map((manager: any) => ({
                value: `${manager.id}`,
                label: manager.name,
            }));
        } catch (err: any) {
            availableManager.error = err.message || 'Failed to fetch available managers.';
        } finally {
            availableManager.isLoading = false;
        }
    },
});
