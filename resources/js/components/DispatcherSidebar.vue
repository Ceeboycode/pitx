<script setup lang="ts">
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import { index as companiesIndex } from '@/routes/companies';
import { index as routesIndex } from '@/routes/routes';
import { index as vehicleTypesIndex } from '@/routes/vehicle-types';

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
} from '@/components/ui/sidebar';

import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';

import { Collapsible, CollapsibleContent, CollapsibleTrigger } from '@/components/ui/collapsible';

import { Building2, Car, ChevronDown, LayoutDashboard, LogOut, Map, Settings } from 'lucide-vue-next';

/* ================= Auth User ================= */
const page = usePage();
const user = computed(() => page.props.auth?.user);

const fullName = computed(() => (user.value ? `${user.value.f_name} ${user.value.l_name}` : 'Dispatcher'));

const initials = computed(() => (user.value ? `${user.value.f_name[0]}${user.value.l_name[0]}` : 'D'));

/* ================= Logout ================= */
const logoutForm = useForm({});
const logout = () => logoutForm.post('/logout');
</script>





<template>
    <Sidebar collapsible="icon" class="h-screen">
        <!-- ================= Header ================= -->
        <SidebarHeader class="shrink-0 px-4 py-3">
            <span class="text-lg font-bold tracking-tight"> Dispatcher Panel </span>
        </SidebarHeader>

        <!-- ================= Content ================= -->
        <SidebarContent class="flex-1 overflow-y-auto">
            <SidebarGroup>
                <SidebarGroupLabel>General</SidebarGroupLabel>

                <SidebarGroupContent>
                    <SidebarMenu>
                        <!-- Dashboard -->
                        <SidebarMenuItem>
                            <SidebarMenuButton as-child :is-active="$page.url.startsWith('/dispatcher/dashboard')">
                                <Link href="/dispatcher/dashboard">
                                    <LayoutDashboard class="mr-2 h-4 w-4" />
                                    <span>Dashboard</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>

                        <!-- Modules -->
                        <Collapsible>
                            <SidebarMenuItem>
                                <CollapsibleTrigger as-child>
                                    <SidebarMenuButton>
                                        <Car class="mr-2 h-4 w-4" />
                                        <span>Modules</span>
                                        <ChevronDown class="ml-auto h-4 w-4 transition-transform data-[state=open]:rotate-180" />
                                    </SidebarMenuButton>
                                </CollapsibleTrigger>
                            </SidebarMenuItem>

                            <CollapsibleContent>
                                <SidebarMenu class="ml-6">
                                    <SidebarMenuItem>
                                        <SidebarMenuButton as-child ">
                                            <Link :href="companiesIndex().url">
                                                <Building2 class="mr-2 h-4 w-4" />
                                                <span>Company</span>
                                            </Link>
                                        </SidebarMenuButton>
                                    </SidebarMenuItem>

                                    <SidebarMenuItem>
                                        <SidebarMenuButton as-child>
                                            <Link :href="routesIndex().url">
                                                <Map class="mr-2 h-4 w-4" />
                                                <span>Routes</span>
                                            </Link>
                                        </SidebarMenuButton>
                                    </SidebarMenuItem>

                                    <SidebarMenuItem>
                                        <SidebarMenuButton as-child :is-active="$page.url.startsWith('/dispatcher/vehicle-types')">
                                            <Link :href="vehicleTypesIndex().url">
                                                <Car class="mr-2 h-4 w-4" />
                                                <span>Vehicle Types</span>
                                            </Link>
                                        </SidebarMenuButton>
                                    </SidebarMenuItem>
                                </SidebarMenu>
                            </CollapsibleContent>
                        </Collapsible>
                    </SidebarMenu>
                </SidebarGroupContent>
            </SidebarGroup>
        </SidebarContent>

        <!-- ================= Footer ================= -->
        <SidebarFooter class="shrink-0 border-t p-2">
            <DropdownMenu>
                <DropdownMenuTrigger as-child>
                    <button class="group flex w-full items-center gap-3 rounded-md px-3 py-2 text-left text-sm transition hover:bg-muted">
                        <!-- Avatar -->
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-primary/10 text-xs font-semibold text-primary">
                            {{ initials }}
                        </div>

                        <!-- User Info -->
                        <div class="flex-1 truncate group-data-[collapsed=true]:hidden">
                            <p class="truncate text-sm leading-none font-medium">
                                {{ fullName }}
                            </p>
                            <p class="truncate text-xs text-muted-foreground">
                                {{ user?.email }}
                            </p>
                        </div>

                        <ChevronDown class="h-4 w-4 opacity-60 group-data-[collapsed=true]:hidden" />
                    </button>
                </DropdownMenuTrigger>

                <DropdownMenuContent side="top" align="start" class="w-56">
                    <DropdownMenuLabel>
                        Logged in as
                        <span class="ml-1 text-xs font-normal text-muted-foreground">
                            {{ user?.role }}
                        </span>
                    </DropdownMenuLabel>

                    <DropdownMenuSeparator />


                    <DropdownMenuItem as-child>
                        <Link href="/dispatcher/settings">
                            <Settings class="mr-2 h-4 w-4" />
                            Settings
                        </Link>
                    </DropdownMenuItem>

                    <DropdownMenuSeparator />

                    <DropdownMenuItem @click="logout" class="text-red-600 focus:text-red-600">
                        <LogOut class="mr-2 h-4 w-4" />
                        Log out
                    </DropdownMenuItem>
                </DropdownMenuContent>
            </DropdownMenu>
        </SidebarFooter>
    </Sidebar>
</template>


