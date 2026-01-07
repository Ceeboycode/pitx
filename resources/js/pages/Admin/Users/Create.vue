<script setup lang="ts">
import { store } from '@/actions/App/Http/Controllers/Admin/UserController';
import { logout } from '@/actions/App/Http/Controllers/Auth/LoginController';
import { useForm } from '@inertiajs/vue3';

defineProps<{
    roles: {
        id: number;
        name: string;
    }[];
}>();

const form = useForm({
    f_name: '',
    m_name: '',
    l_name: '',
    suffix: '',
    email: '',
    phone: '',
    role_id: '',
});
// const logoutForm = useForm({});

// const handleLogout = () => {
//     logoutForm.post(logout().url);
// };
const submit = () => {
    form.post(store().url);
    console.log(form);
};
</script>

<template>
    <div class="flex justify-center py-10">
        <div class="w-full max-w-xl rounded-xl bg-white p-6 shadow-md">
            <h1 class="mb-6 text-2xl font-semibold text-gray-800">Create User</h1>

            <form @submit.prevent="submit" class="space-y-5">
                <!-- First Name -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700"> First Name </label>
                    <input
                        v-model="form.f_name"
                        type="text"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    />
                    <p v-if="form.errors.f_name" class="mt-1 text-sm text-red-500">
                        {{ form.errors.f_name }}
                    </p>
                </div>

                <!-- Middle Name -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700"> Middle Name </label>
                    <input
                        v-model="form.m_name"
                        type="text"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    />
                </div>

                <!-- Last Name -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700"> Last Name </label>
                    <input
                        v-model="form.l_name"
                        type="text"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    />
                    <p v-if="form.errors.l_name" class="mt-1 text-sm text-red-500">
                        {{ form.errors.l_name }}
                    </p>
                </div>

                <!-- Suffix -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700"> Suffix </label>
                    <input
                        v-model="form.suffix"
                        type="text"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    />
                </div>

                <!-- Email -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700"> Email </label>
                    <input
                        v-model="form.email"
                        type="email"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    />
                    <p v-if="form.errors.email" class="mt-1 text-sm text-red-500">
                        {{ form.errors.email }}
                    </p>
                </div>

                <!-- Phone -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700"> Phone </label>
                    <input
                        v-model="form.phone"
                        type="text"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    />
                    <p v-if="form.errors.phone" class="mt-1 text-sm text-red-500">
                        {{ form.errors.phone }}
                    </p>
                </div>

                <!-- Role -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700"> Role </label>

                    <select
                        v-model="form.role_id"
                        class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    >
                        <option disabled value="">Select role</option>

                        <option v-for="role in roles" :key="role.id" :value="role.id">
                            {{ role.name }}
                        </option>
                    </select>

                    <p v-if="form.errors.role_id" class="mt-1 text-sm text-red-500">
                        {{ form.errors.role_id }}
                    </p>
                </div>

                <!-- Submit -->
                <div class="pt-4">
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-indigo-700 disabled:cursor-not-allowed disabled:opacity-60"
                    >
                        {{ form.processing ? 'Creating...' : 'Create User' }}
                    </button>
                </div>
            </form>

            <!-- <button
                @click="handleLogout"
                :disabled="logoutForm.processing"
                class="mt-4 w-full rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-red-700 disabled:cursor-not-allowed disabled:opacity-60"
            >
                {{ logoutForm.processing ? 'Logging out...' : 'Logout' }}
            </button> -->
        </div>
    </div>
</template>
