<script setup lang="ts">
import AppComboboxTrigger from '@/components/AppComboboxTrigger.vue';
import { H4 } from '@/components/typography/headings';
import { Button } from '@/components/ui/button';
import { availableManager } from '@/stores/admin/availableManagerStore';
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';
import { toast } from 'vue-sonner';

const props = defineProps<{
    clubId: number;
}>();

const emit = defineEmits(['add-manager']);

interface Manager {
    value: string;
    label: string;
}

const selectedManager = ref<Manager | null>(null);

const handleSelectedManager = (event: any) => {
    selectedManager.value = event;
};
const handleAddManager = () => {
    if (!selectedManager.value) {
        toast.error('Please select a manager');
        return;
    }

    router.post(
        route('club.admin.club.managers.add', { clubId: props.clubId, userId: selectedManager.value.value }),
        {},
        {
            errorBag: 'add-manager',
            preserveScroll: true,
            onSuccess: () => {
                toast.success('Manager added successfully');
                emit('add-manager');
                selectedManager.value = null;
            },
            onError: (error) => {
                toast.error(error.message || 'Error adding manager');
                console.error(error);
            },
        },
    );
};
</script>

<template>
    <H4>Add a manager</H4>
    <div class="flex flex-row items-end gap-2">
        <AppComboboxTrigger item-name="user" :items="availableManager.availableManagers" @select="handleSelectedManager($event)" />
        <Button :disabled="!selectedManager" @click="handleAddManager()"> Add a manager </Button>
    </div>
</template>

<style scoped></style>
