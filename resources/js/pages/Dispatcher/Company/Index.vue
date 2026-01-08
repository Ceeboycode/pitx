<script setup lang="ts">
import DispatcherLayout from '@/layouts/DispatcherLayout.vue';
import { create, edit } from '@/routes/companies';
import { Link, useForm } from '@inertiajs/vue3';

/**
 * Interfaces
 */
interface User {
    id: number;
    f_name: string;
    l_name: string;
}

interface Company {
    id: number;
    name: string;
    created_at: string | null;
    updated_at: string | null;
    creator?: User;
    updater?: User;
}

/**
 * Props
 */
defineProps<{
    companies: Company[];
}>();

/**
 * Helpers
 */
const formatDate = (date: string | null) => (date ? new Date(date).toLocaleDateString() : '-');

const form = useForm({});

/**
 * Actions
 */
const handleEdit = (id: number) => {
    form.get(edit(id).url);
};

const handleDelete = (id: number) => {
    if (confirm('Are you sure you want to delete this company?')) {
        console.log(`Delete company with ID: ${id}`);
        // later:
        // form.delete(destroy(id).url);
    }
};

defineOptions({
    layout: DispatcherLayout,
});
</script>

<template>
    <div class="space-y-6">
        <!-- Header / Action -->
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold">Companies</h2>
            <Link
                :href="create().url"
                class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700"
            >
                + Create Company
            </Link>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg border bg-white shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Company Name</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Created By</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Updated By</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Created At</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Updated At</th>
                        <th class="px-4 py-3 text-right text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    <tr v-for="company in companies" :key="company.id">
                        <td class="px-4 py-3 font-medium text-gray-900">
                            {{ company.name }}
                        </td>
                        <td class="px-4 py-3">
                            {{ company.creator ? company.creator.f_name + ' ' + company.creator.l_name : '-' }}
                        </td>
                        <td class="px-4 py-3">
                            {{ company.updater ? company.updater.f_name + ' ' + company.updater.l_name : '-' }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-600">
                            {{ formatDate(company.created_at) }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-600">
                            {{ formatDate(company.updated_at) }}
                        </td>
                        <td class="space-x-2 px-4 py-3 text-right">
                            <button
                                class="rounded bg-blue-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-700"
                                @click="handleEdit(company.id)"
                            >
                                Edit
                            </button>
                            <button
                                class="rounded bg-red-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-red-700"
                                @click="handleDelete(company.id)"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>

                    <tr v-if="!companies.length">
                        <td colspan="6" class="px-4 py-8 text-center text-gray-500">No companies found.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
