<template>
    <SidebarProvider>
        <div class="flex w-screen overflow-hidden">
            <!-- Sidebar -->
            <DispatcherSidebar />

            <!-- Main content area -->
            <div class="flex flex-1 flex-col overflow-hidden">
                <!-- Top bar -->
                <header class="flex h-14 shrink-0 items-center border-b px-4">
                    <SidebarTrigger />
                    <h1 class="ml-4 font-semibold">Dispatcher</h1>
                </header>

                <!-- Page content -->
                <main class="flex flex-1 overflow-auto bg-gray-50">
                    <div class="w-full px-6 py-8">
                        <slot />
                    </div>
                </main>
            </div>
        </div>
    </SidebarProvider>
</template>

<script setup>
import DispatcherSidebar from '@/components/DispatcherSidebar.vue';
import { SidebarProvider, SidebarTrigger } from '@/components/ui/sidebar';
</script>
