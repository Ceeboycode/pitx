<script setup lang="ts">
import { index } from '@/routes/companies';
import { store } from '@/actions/App/Http/Controllers/Dispatcher/CompanyController';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
});
const submit = () => {
    form.post(store().url);
    console.log(form);
};

</script>


<template>
    <!-- Form -->
    <form @submit.prevent="submit" class="space-y-5">
        <!-- Name -->
        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700"> Company Name </label>

            <input
                v-model="form.name"
                type="text"
                class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none"
                placeholder="e.g. Company name"
            />

            <p v-if="form.errors.name" class="mt-1 text-sm text-red-600">
                {{ form.errors.name }}
            </p>
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-3">
            <Link :href="index().url" class="rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"> Cancel </Link>

            <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700 disabled:opacity-50">
                Create
            </button>
        </div>
    </form>
</template>
