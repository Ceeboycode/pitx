<template>
    <SidebarProvider>
        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <AppSidebar />

            <!-- Main content -->
            <div class="flex flex-1 flex-col">
                <!-- Top bar -->
                <header class="flex h-14 items-center border-b px-4">
                    <SidebarTrigger />
                    <h1 class="ml-4 font-semibold">Admin</h1>
                </header>

                <!-- Page content -->
                <main class="flex-1 bg-muted/40 p-6">
                    <slot />

                </main>
            </div>
        </div>
    </SidebarProvider>
</template>

<script setup>
import AppSidebar from '@/components/AppSidebar.vue';
import { SidebarProvider, SidebarTrigger } from '@/components/ui/sidebar';
</script>
