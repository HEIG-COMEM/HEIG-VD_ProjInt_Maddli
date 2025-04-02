<script setup lang="ts">
import { Muted } from '@/components/typography/texts';
import {
    Combobox,
    ComboboxAnchor,
    ComboboxEmpty,
    ComboboxGroup,
    ComboboxInput,
    ComboboxItem,
    ComboboxItemIndicator,
    ComboboxList,
} from '@/components/ui/combobox';
import { cn } from '@/lib/utils';
import { Check, Search } from 'lucide-vue-next';

defineProps<{
    items: {
        label: string;
        value: string;
    }[];
    itemName: string;
}>();

defineEmits<{
    (e: 'select', item: { label: string; value: string }): void;
}>();
</script>

<template>
    <div>
        <Muted> Select {{ itemName }} ({{ items.length }}) </Muted>
        <Combobox by="label">
            <ComboboxAnchor>
                <div class="relative w-full items-center">
                    <ComboboxInput class="pl-9" :display-value="(val) => val?.label ?? ''" :placeholder="`Select ${itemName}...`" />
                    <span class="absolute inset-y-0 start-0 flex items-center justify-center px-3">
                        <Search class="size-4 text-muted-foreground" />
                    </span>
                </div>
            </ComboboxAnchor>

            <ComboboxList>
                <ComboboxEmpty> No {{ itemName }} found. </ComboboxEmpty>

                <ComboboxGroup>
                    <ComboboxItem v-for="item in items" :key="item.value" :value="item" @select="$emit('select', item)">
                        {{ item.label }}

                        <ComboboxItemIndicator>
                            <Check :class="cn('ml-auto h-4 w-4')" />
                        </ComboboxItemIndicator>
                    </ComboboxItem>
                </ComboboxGroup>
            </ComboboxList>
        </Combobox>
    </div>
</template>
