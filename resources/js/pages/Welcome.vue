<script setup lang="ts">
import { login } from '@/routes';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth.user);

const dashboardUrl = computed(() => user.value?.dashboard_url ?? null);
</script>

<template>
    <Head title="Welcome Page" />

    <div class="flex min-h-screen items-center justify-center bg-gray-100">
        <div class="w-full max-w-sm rounded-lg border border-gray-200 bg-white p-6 text-center shadow-sm">
            <h1 class="mb-2 text-2xl font-semibold text-gray-800">Welcome to PITX</h1>

            <p class="mb-6 text-sm text-gray-600">Parañaque Integrated Terminal Exchange</p>

            <!-- Logged in (ANY ROLE) -->
            <Link
                v-if="dashboardUrl"
                :href="dashboardUrl"
                class="block w-full rounded-md bg-blue-600 py-2.5 text-sm font-medium text-white transition hover:bg-blue-700"
            >
                Go to Dashboard
            </Link>

            <!-- Guest -->
            <Link
                v-else
                :href="login().url"
                class="block w-full rounded-md bg-gray-800 py-2.5 text-sm font-medium text-white transition hover:bg-gray-900"
            >
                Login
            </Link>
        </div>
    </div>
</template>
