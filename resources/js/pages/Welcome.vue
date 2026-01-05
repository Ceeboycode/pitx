<script setup lang="ts">
import { login } from '@/routes';
import { logout } from '@/actions/App/Http/Controllers/Auth/LoginController';
</script>

<template>
    <Head title="Welcome Page" />
    <div class="flex min-h-screen items-center justify-center bg-gray-100">
        <div class="w-full max-w-sm rounded-lg border border-gray-200 bg-white p-6 text-center shadow-sm">
            <!-- Title -->
            <h1 class="mb-2 text-2xl font-semibold text-gray-800">Welcome to PITX</h1>

            <p class="mb-6 text-sm text-gray-600">Parañaque Integrated Terminal Exchange</p>

            <!-- Login Button -->
            <Link :href="login().url" class="block w-full rounded-md bg-gray-800 py-2.5 text-sm font-medium text-white transition hover:bg-gray-900">
                Login
            </Link>
        </div>
    </div>
</template>
