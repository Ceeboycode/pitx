<script setup lang="ts">
import DispatcherLayout from '@/layouts/DispatcherLayout.vue';

defineOptions({
    layout: DispatcherLayout,
});
</script>

<template>
    <Head title="Dispatcher Dashboard" />

    <div class="space-y-8">
        <!-- Header -->
        <div>
            <h2 class="text-2xl font-bold">Dispatcher Dashboard</h2>
            <p class="mt-2 text-gray-600">Welcome to the dispatcher dashboard. Here you can manage routes, vehicles, and settings.</p>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-lg bg-white p-5 shadow">
                <p class="text-sm text-gray-500">Active Routes</p>
                <p class="mt-2 text-3xl font-bold">12</p>
            </div>

            <div class="rounded-lg bg-white p-5 shadow">
                <p class="text-sm text-gray-500">Vehicles On Road</p>
                <p class="mt-2 text-3xl font-bold">34</p>
            </div>

            <div class="rounded-lg bg-white p-5 shadow">
                <p class="text-sm text-gray-500">Delayed Deliveries</p>
                <p class="mt-2 text-3xl font-bold text-red-600">3</p>
            </div>

            <div class="rounded-lg bg-white p-5 shadow">
                <p class="text-sm text-gray-500">Available Drivers</p>
                <p class="mt-2 text-3xl font-bold">8</p>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="rounded-lg bg-white shadow">
            <div class="border-b px-6 py-4">
                <h3 class="text-lg font-semibold">Recent Activity</h3>
            </div>
            <ul class="divide-y">
                <li class="flex justify-between px-6 py-4">
                    <span>Route #102 assigned to Vehicle A12</span>
                    <span class="text-sm text-gray-500">10 min ago</span>
                </li>
                <li class="flex justify-between px-6 py-4">
                    <span>Vehicle B07 marked as delayed</span>
                    <span class="text-sm text-gray-500">30 min ago</span>
                </li>
                <li class="flex justify-between px-6 py-4">
                    <span>Driver John D. checked in</span>
                    <span class="text-sm text-gray-500">1 hour ago</span>
                </li>
            </ul>
        </div>

        <!-- Quick Actions -->
        <div class="rounded-lg bg-white p-6 shadow">
            <h3 class="mb-4 text-lg font-semibold">Quick Actions</h3>
            <div class="flex flex-wrap gap-4">
                <button class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Create Route</button>
                <button class="rounded bg-green-600 px-4 py-2 text-white hover:bg-green-700">Assign Vehicle</button>
                <button class="rounded bg-gray-600 px-4 py-2 text-white hover:bg-gray-700">Manage Drivers</button>
            </div>
        </div>
    </div>
</template>
