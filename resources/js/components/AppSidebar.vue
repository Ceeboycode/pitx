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
                        <!-- Dashboard -->
                        <SidebarMenuItem>
                            <SidebarMenuButton as-child>
                                <Link href="/admin/dashboard">
                                    <LayoutDashboard class="mr-2 h-4 w-4" />
                                    <span>Dashboard</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>

                        <!-- User Management -->
                        <SidebarMenuItem>
                            <SidebarMenuButton as-child>
                                <Link :href="UserController.create().url">
                                    <Users class="mr-2 h-4 w-4" />
                                    <span>User management</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>

                        <!-- Settings -->
                        <SidebarMenuItem>
                            <SidebarMenuButton as-child>
                                <Link href="/admin/settings">
                                    <Settings class="mr-2 h-4 w-4" />
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

import { LayoutDashboard, Settings, Users } from 'lucide-vue-next';

import UserController from '@/actions/App/Http/Controllers/Admin/UserController';
</script>
