<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

import { Button } from '@/components/ui/button';
import { Dialog, DialogClose, DialogContent, DialogFooter, DialogHeader, DialogTitle } from '@/components/ui/dialog';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';

import { store, update } from '@/actions/App/Http/Controllers/Dispatcher/VehicleTypeController';
import DispatcherLayout from '@/layouts/DispatcherLayout.vue';

/* --------------------------------------------------------------------------
| Types
|-------------------------------------------------------------------------- */
interface User {
    id: number;
    f_name: string;
    l_name: string;
}

interface VehicleType {
    id: number;
    name: string;
    created_at: string | null;
    creator?: User;
    updater?: User;
}

/* --------------------------------------------------------------------------
| Props
|-------------------------------------------------------------------------- */
defineProps<{
    vehicleTypes: VehicleType[];
}>();

/* --------------------------------------------------------------------------
| Dialog & Mode State
|-------------------------------------------------------------------------- */

// Controls if the dialog is open or closed
const open = ref(false);

// Are we editing or creating?
const isEdit = ref(false);

// Stores the ID of the record being edited
const editingId = ref<number | null>(null);

/* --------------------------------------------------------------------------
| Form State (Inertia)
|-------------------------------------------------------------------------- */
const form = useForm({
    name: '',
});

/* --------------------------------------------------------------------------
| Helper Functions
|-------------------------------------------------------------------------- */
const formatDate = (date: string | null) => {
    return date ? new Date(date).toLocaleDateString() : '-';
};

/* --------------------------------------------------------------------------
| Dialog Actions
|-------------------------------------------------------------------------- */

// Open dialog in CREATE mode
const openCreateDialog = () => {
    isEdit.value = false;
    editingId.value = null;

    form.reset();
    form.clearErrors();

    open.value = true;
};

// Open dialog in EDIT mode
const openEditDialog = (type: VehicleType) => {
    console.log(type.id);
    isEdit.value = true;
    editingId.value = type.id;

    // Pre-fill form
    form.name = type.name;

    form.clearErrors();
    open.value = true;
};

/* --------------------------------------------------------------------------
| Submit Form (Create or Update)
|-------------------------------------------------------------------------- */
const submitForm = () => {
    // EDIT
    if (isEdit.value && editingId.value !== null) {
        form.put(update(editingId.value).url, {
            onSuccess: () => {
                closeDialog();
            },
        });
        return;
    }

    // CREATE
    form.post(store().url, {
        onSuccess: () => {
            closeDialog();
        },
    });
};

// Close dialog & reset form
const closeDialog = () => {
    open.value = false;
    form.reset();
};

defineOptions({
    layout: DispatcherLayout,
});
</script>

<template>
    <!-- ===================== CREATE BUTTON ===================== -->
    <div class="mb-4 flex justify-end">
        <Button @click="openCreateDialog"> + Create Vehicle Type </Button>
    </div>

    <!-- ===================== DIALOG ===================== -->
    <Dialog v-model:open="open">
        <DialogContent class="sm:max-w-[425px]">
            <form @submit.prevent="submitForm">
                <DialogHeader>
                    <DialogTitle>
                        {{ isEdit ? 'Edit Vehicle Type' : 'Create Vehicle Type' }}
                    </DialogTitle>
                </DialogHeader>

                <!-- Form Fields -->
                <div class="grid gap-4">
                    <div class="grid gap-2">
                        <Label for="name">Name</Label>

                        <Input id="name" v-model="form.name" :class="{ 'border-red-500': form.errors.name }" />

                        <p v-if="form.errors.name" class="text-sm text-red-500">
                            {{ form.errors.name }}
                        </p>
                    </div>
                </div>

                <!-- Footer -->
                <DialogFooter class="mt-4">
                    <DialogClose as-child>
                        <Button type="button" variant="outline"> Cancel </Button>
                    </DialogClose>

                    <Button type="submit" :disabled="form.processing">
                        {{ isEdit ? 'Update' : 'Save' }}
                    </Button>
                </DialogFooter>
            </form>
        </DialogContent>
    </Dialog>

    <!-- ===================== TABLE ===================== -->
    <div class="overflow-x-auto rounded-lg border border-gray-200 bg-white">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Created By</th>
                    <th class="px-4 py-3 text-left">Updated By</th>
                    <th class="px-4 py-3 text-left">Created At</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                <tr v-for="type in vehicleTypes" :key="type.id" class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium">
                        {{ type.name }}
                    </td>

                    <td class="px-4 py-3">
                        {{ type.creator?.f_name ?? '—' }}
                        {{ type.creator?.l_name ?? '-' }}
                    </td>

                    <td class="px-4 py-3">
                        {{ type.updater?.f_name ?? '—' }}
                        {{ type.updater?.l_name ?? '-' }}
                    </td>

                    <td class="px-4 py-3 text-gray-500">
                        {{ formatDate(type.created_at) }}
                    </td>

                    <td class="space-x-3 px-4 py-3 text-right">
                        <button class="text-indigo-600 hover:text-indigo-800" @click="openEditDialog(type)">Edit</button>

                        <button class="text-red-600 hover:text-red-800">Delete</button>
                    </td>
                </tr>

                <tr v-if="!vehicleTypes.length">
                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">No vehicle types found.</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
