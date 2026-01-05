<script setup lang="ts">
import { logout } from '@/actions/App/Http/Controllers/Auth/LoginController';
import { useForm } from '@inertiajs/vue3';

const logoutForm = useForm({});

const handleLogout = () => {
    logoutForm.post(logout().url);
};
</script>



<template>
    <button
        @click="handleLogout"
        :disabled="logoutForm.processing"
        class="mt-4 w-full rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-red-700 disabled:cursor-not-allowed disabled:opacity-60"
    >
        {{ logoutForm.processing ? 'Logging out...' : 'Logout' }}
    </button>
</template>
