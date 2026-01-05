<script setup lang="ts">
import { Link, useForm } from '@inertiajs/vue3';
import { update } from '@/actions/App/Http/Controllers/Dispatcher/VehicleTypeController';
import { index } from '@/routes/vehicle-types';
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
    creator?: User;
    updater?: User;
}

/**
 * Props
 */
const props = defineProps<{
    vehicleType: VehicleType;
}>();

/**
 * Form
 */
const form = useForm({
    name: props.vehicleType.name,
});

/**
 * Submit
 */
const submit = () => {
    form.put(update(props.vehicleType.id).url);
};
</script>

<template>
    <div class="mx-auto max-w-xl rounded-lg bg-white p-6 shadow">
        <!-- Header -->
        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-xl font-semibold text-gray-800">Edit Vehicle Type</h1>

            <Link :href="index().url" class="text-sm text-gray-600 hover:text-gray-900"> ← Back </Link>
        </div>

        <!-- Info -->
        <div class="mb-6 space-y-2 text-sm text-gray-600">
            <p>
                <strong>Created by:</strong>
                {{ vehicleType.creator?.f_name ?? '—' }}
                {{ vehicleType.creator?.l_name ?? '' }}
            </p>

            <p>
                <strong>Updated by:</strong>
                {{ vehicleType.updater?.f_name ?? '—' }}
                {{ vehicleType.updater?.l_name ?? '' }}
            </p>
        </div>

        <!-- Form -->
        <form @submit.prevent="submit" class="space-y-5">
            <!-- Name -->
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700"> Vehicle Type Name </label>

                <input
                    v-model="form.name"
                    type="text"
                    class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none"
                />

                <p v-if="form.errors.name" class="mt-1 text-sm text-red-600">
                    {{ form.errors.name }}
                </p>
            </div>

            <!-- Actions -->
            <div class="flex justify-end gap-3">
                <Link :href="index().url" class="rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    Cancel
                </Link>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700 disabled:opacity-50"
                >
                    Update
                </button>
            </div>
        </form>
    </div>
</template>
