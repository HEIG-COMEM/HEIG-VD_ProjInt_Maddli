import axios from 'axios';
import { reactive } from 'vue';

export const availableLicence = reactive({
    availableLicences: [] as Array<{ value: string; label: string }>,
    isLoading: false,
    error: null as string | null,
    fetchAvailableLicences: async () => {
        availableLicence.isLoading = true;
        availableLicence.error = null;
        try {
            const response = await axios.get(route('club.admin.api.available-licences'));
            // Transform the response to include only the id and name
            availableLicence.availableLicences = response.data.licences.map((licence: any) => ({
                value: `${licence.id}`,
                label: licence.name,
            }));
        } catch (err: any) {
            availableLicence.error = err.message || 'Failed to fetch available licences.';
        } finally {
            availableLicence.isLoading = false;
        }
    },
});
