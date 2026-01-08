<script setup lang="ts">
import { create, edit } from '@/routes/companies';
import { useForm } from '@inertiajs/vue3';

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
 * Props from Inertia
 */
defineProps<{
    companies: Company[];
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
            + Create Company
        </Link>
    </div>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Created By (User ID)</th>
                <th>Updated By (User ID)</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <template v-if="companies.length">
                <tr v-for="company in companies" :key="company.id">
                    <td>{{ company.name }}</td>
                    <td>
                        {{ company.creator ? company.creator.f_name + ' ' + company.creator.l_name : '-' }}
                    </td>
                    <td>
                        {{ company.updater ? company.updater.f_name + ' ' + company.updater.l_name : '-' }}
                    </td>
                    <td>{{ formatDate(company.created_at) }}</td>
                    <td>{{ formatDate(company.updated_at) }}</td>
                    <td class="space-x-2">
                        <button class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600" @click="handleEdit(company.id)">Edit</button>
                        <button class="rounded bg-red-500 px-4 py-2 text-white hover:bg-red-600">Delete</button>
                    </td>
                </tr>
            </template>

            <tr v-else>
                <td colspan="6" class="px-4 py-6 text-center text-gray-500">No companies found.</td>
            </tr>
        </tbody>
    </table>
</template>

<style scoped>
table {
    width: 100%;
    border-collapse: collapse;
}
th,
td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}
th {
    background-color: #f4f4f4;
}
</style>
