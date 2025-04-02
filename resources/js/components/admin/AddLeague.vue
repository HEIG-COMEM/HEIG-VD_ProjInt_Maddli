<script setup lang="ts">
import { H4 } from '@/components/typography/headings';
import { Button } from '@/components/ui/button';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import { router } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';
import { toast } from 'vue-sonner';

const emit = defineEmits(['add-league']);

const props = defineProps<{
    clubId: number;
}>();

const leagues = ref<Array<{ value: string; label: string }>>([]);
const isLoading = ref(false);
const error = ref<string | null>(null);

const fetchLeagues = async () => {
    isLoading.value = true;
    error.value = null;

    try {
        const response = await axios.get(route('club.admin.api.leagues'));
        leagues.value = response.data.leagues.map((league: any) => ({
            value: `${league.id}`,
            label: league.name,
        }));
    } catch (err: any) {
        error.value = err.message || 'Failed to fetch available leagues.';
    } finally {
        isLoading.value = false;
    }
};

const selectedLeague = ref<string | null>(null);
const handleAddLeague = () => {
    if (!selectedLeague.value) {
        toast.error('Please select a league');
        return;
    }

    router.post(
        route('club.admin.club.leagues.add', { clubId: props.clubId, leagueId: selectedLeague.value }),
        {},
        {
            errorBag: 'add-league',
            preserveScroll: true,
            onSuccess: () => {
                toast.success('League added successfully');
                emit('add-league');
                selectedLeague.value = null;
            },
            onError: (error) => {
                toast.error(error.message || 'Failed to add league');
                console.error(error);
                selectedLeague.value = null;
            },
        },
    );
};

fetchLeagues();
</script>

<template>
    <div class="flex flex-col gap-2">
        <H4>Add a league</H4>
        <div class="flex flex-row items-end gap-2">
            <Select v-model="selectedLeague">
                <SelectTrigger>
                    <SelectValue placeholder="Select a league" />
                </SelectTrigger>
                <SelectContent>
                    <SelectItem v-if="!leagues.length" value="empty" disabled>No leagues found</SelectItem>
                    <SelectItem v-for="league in leagues" :key="league.value" :value="league.value" class="cursor-pointer">
                        {{ league.label }}
                    </SelectItem>
                </SelectContent>
            </Select>
            <Button :disabled="!selectedLeague" @click="handleAddLeague()"> Add a league </Button>
        </div>
    </div>
</template>

<style scoped></style>
