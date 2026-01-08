<script setup lang="ts">
import { logout } from '@/actions/App/Http/Controllers/Auth/LoginController';
import AdminSidebar from '@/components/Admin/AdminSidebar.vue';
import { Separator } from '@/components/ui/separator';
import { SidebarInset, SidebarProvider, SidebarTrigger } from '@/components/ui/sidebar';
import { useForm } from '@inertiajs/vue3';
import type { Component } from 'vue';
import { ref } from 'vue';

const logoutForm = useForm({});

const handleLogout = () => {
    logoutForm.post(logout().url);
};

const views = {};

type ViewKey = keyof typeof views;

const currentView = ref<Component>(views);

function switchView(viewKey: ViewKey) {
    const view = views[viewKey];
    if (view) currentView.value = view;
}
</script>

<template>
    <SidebarProvider>
        <AdminSidebar @navigate="switchView" />
        <SidebarInset>
            <header class="sticky top-0 z-20 flex h-16 shrink-0 items-center gap-2 border-b bg-card px-4">
                <SidebarTrigger class="-ml-1" />
                <Separator orientation="vertical" class="mr-2 data-[orientation=vertical]:h-4" />
            </header>
            <div class="z-0 flex flex-1 flex-col gap-4 p-4">
                <!-- <component class="min-h-[100vh] flex-1 rounded-xl md:min-h-min bg-red-300" :is="currentView" /> -->
                <!-- ginawa ko lang red yung element para mas makita -->
                <button
                    @click="handleLogout"
                    :disabled="logoutForm.processing"
                    class="mt-4 w-full rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-red-700 disabled:cursor-not-allowed disabled:opacity-60"
                >
                    {{ logoutForm.processing ? 'Logging out...' : 'Logout' }}
                </button>
                <component class="min-h-[100vh] flex-1 rounded-xl md:min-h-min" :is="currentView" />
            </div>
        </SidebarInset>
    </SidebarProvider>
</template>
