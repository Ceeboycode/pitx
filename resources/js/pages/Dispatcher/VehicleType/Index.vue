<script setup lang="ts">
import { create, edit } from '@/routes/vehicle-types';
import { useForm } from '@inertiajs/vue3';



/**
 * Interfaces
 */
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

/**
 * Props from Inertia
 */
defineProps<{
    vehicleTypes: VehicleType[];
}>();

/**
 * Helpers
 */
const formatDate = (date: string | null) => {
    return date ? new Date(date).toLocaleDateString() : '-';
};
const editForm = useForm({});

const handleEdit = (id: number) => {
    editForm.get(edit(id).url);
    console.log(`Edit vehicle type with ID: ${id}`);
};
</script>

<template>
    <div class="mb-4 flex justify-end">
        <Link
            :href="create().url"
            class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700"
        >
            + Create Vehicle Type
        </Link>
    </div>
    <div class="overflow-x-auto rounded-lg border border-gray-200 bg-white">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <!-- Header -->
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Name</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Created By</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Updated By</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Created At</th>
                    <th class="px-4 py-3 text-right font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>

            <!-- Body -->
            <tbody class="divide-y divide-gray-100">
                <!-- Data Rows -->
                <template v-if="vehicleTypes.length">
                    <tr v-for="type in vehicleTypes" :key="type.id" class="transition hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-900">
                            {{ type.name }}
                        </td>

                        <td class="px-4 py-3">{{ type.creator?.f_name ?? '—' }} {{ type.creator?.l_name ?? '-' }}</td>

                        <td class="px-4 py-3">{{ type.updater?.f_name ?? '—' }} {{ type.updater?.l_name ?? '-' }}</td>

                        <td class="px-4 py-3 text-gray-500">
                            {{ formatDate(type.created_at) }}
                        </td>

                        <td class="space-x-3 px-4 py-3 text-right">
                            <button @click="handleEdit(type.id)" class="text-indigo-600 hover:text-indigo-800" >Edit</button>

                            <button class="text-red-600 hover:text-red-800">Delete</button>
                        </td>
                    </tr>
                </template>

                <!-- Empty State -->
                <tr v-else>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">No vehicle types found.</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
