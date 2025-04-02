<script setup lang="ts">
import AppComboboxTrigger from '@/components/AppComboboxTrigger.vue';
import { H4 } from '@/components/typography/headings';
import { Button } from '@/components/ui/button';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import { availableCoach } from '@/stores/admin/availableCoachStore';
import { router } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';
import { toast } from 'vue-sonner';

const props = defineProps<{
    clubId: number;
}>();

const emit = defineEmits(['add-coach']);

const availableLeagues = ref<Array<{ value: string; label: string }>>([]);
const isLoading = ref(false);
const error = ref<string | null>(null);

const fetchAvailableLeagues = async (clubId: number) => {
    isLoading.value = true;
    error.value = null;

    try {
        const response = await axios.get(route('club.admin.api.available-leagues', { id: clubId }));
        availableLeagues.value = response.data.leagues.map((league: any) => ({
            value: `${league.id}`,
            label: league.name,
        }));
    } catch (err: any) {
        error.value = err.message || 'Failed to fetch available leagues.';
    } finally {
        isLoading.value = false;
    }
};

interface Coach {
    value: string;
    label: string;
}

const selectedCoach = ref<Coach | null>(null);
const selectedLeague = ref<string | null>(null);
const handleSelectedCoach = (event: any) => {
    selectedCoach.value = event;
};
const handleAddCoach = () => {
    if (!selectedCoach.value || !selectedLeague.value) {
        toast.error('Please select a coach and a league');
        return;
    }

    router.post(
        route('club.admin.club.coaches.add', { clubId: props.clubId, userId: selectedCoach.value.value }),
        {
            leagueId: selectedLeague.value,
        },
        {
            errorBag: 'add-coach',
            preserveScroll: true,
            onSuccess: () => {
                toast.success('Coach added successfully');
                emit('add-coach');
                selectedCoach.value = null;
                selectedLeague.value = null;
            },
            onError: (error) => {
                toast.error(error.message || 'Failed to add coach');
                console.error(error);
            },
        },
    );
};

fetchAvailableLeagues(props.clubId);
</script>

<template>
    <div class="flex flex-col gap-2">
        <H4>Add a coaching staff</H4>
        <div class="flex flex-row items-end gap-2">
            <AppComboboxTrigger item-name="user" :items="availableCoach.availableCoaches" @select="handleSelectedCoach($event)" />
            <Select v-model="selectedLeague" :disabled="!selectedCoach?.label">
                <SelectTrigger>
                    <SelectValue placeholder="Select a league" />
                </SelectTrigger>
                <SelectContent>
                    <SelectItem v-if="!availableLeagues.length" value="empty" disabled>No leagues found</SelectItem>
                    <SelectItem v-for="league in availableLeagues" :key="league.value" :value="league.value">
                        {{ league.label }}
                    </SelectItem>
                </SelectContent>
            </Select>
            <Button :disabled="!selectedCoach || !selectedLeague" @click="handleAddCoach()"> Add a coach </Button>
        </div>
    </div>
</template>

<style scoped></style>
