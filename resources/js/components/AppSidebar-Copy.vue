<script>
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarGroup,
    SidebarGroupContent,
    SidebarGroupLabel,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
    SidebarRail,
} from '@/components/ui/sidebar';

import UserController from '@/actions/App/Http/Controllers/Admin/UserController';
</script>

<template>
    <Sidebar collapsible="icon">
        <!-- Header -->
        <SidebarHeader class="px-4 py-3">
            <span class="font-bold">Admin Panel</span>
        </SidebarHeader>

        <!-- Content -->
        <SidebarContent>
            <SidebarGroup>
                <SidebarGroupLabel>General</SidebarGroupLabel>

                <SidebarGroupContent>
                    <SidebarMenu>
                        <SidebarMenuItem>
                            <SidebarMenuButton as-child>
                                <Link href="/admin/dashboard">
                                    <span>Dashboard</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>

                        <SidebarMenuItem>
                            <SidebarMenuButton as-child>
                                <Link :href="UserController.create().url">
                                    <span>User management</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>

                        <SidebarMenuItem>
                            <SidebarMenuButton as-child>
                                <Link href="/admin/settings">
                                    <span>Settings</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>
                    </SidebarMenu>
                </SidebarGroupContent>
            </SidebarGroup>
        </SidebarContent>

        <!-- Footer -->
        <SidebarFooter class="p-4 text-sm text-muted-foreground"> Logged in as Admin </SidebarFooter>

        <!-- Collapsed hover rail -->
        <SidebarRail />
    </Sidebar>
</template>

<script setup>
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarGroup,
    SidebarGroupContent,
    SidebarGroupLabel,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
    SidebarRail,
} from '@/components/ui/sidebar';

import { Link } from '@inertiajs/vue3';
</script>
