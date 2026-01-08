<script setup lang="ts">
import { BadgeCheck, Bell, ChevronsUpDown, CreditCard, LogOut, Sparkles, CircleUser } from 'lucide-vue-next';
import { logout } from '@/actions/App/Http/Controllers/Auth/LoginController';
import { useForm } from '@inertiajs/vue3';

import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuGroup,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { SidebarMenu, SidebarMenuButton, SidebarMenuItem, useSidebar } from '@/components/ui/sidebar';

const props = defineProps<{
    user: {
        fname: string;
        lname: string;
        email: string;
        avatar: string;
    };
}>();

const logoutForm = useForm({});

const handleLogout = () => {
    logoutForm.post(logout().url);
};
const { isMobile } = useSidebar();
</script>

<template>
    <SidebarMenu>
        <SidebarMenuItem>
            <DropdownMenu>
                <DropdownMenuTrigger as-child>
                    <SidebarMenuButton size="lg" class="data-[state=open]:bg-sidebar-accent data-[state=open]:text-sidebar-accent-foreground">
                        <Avatar class="h-8 w-8 rounded-lg">
                            <AvatarImage :src="user.avatar" :alt="user.fname + user.lname" />
                            <AvatarFallback class="rounded-lg"> {{ user.fname.charAt(0) + user.lname.charAt(0) }} </AvatarFallback>
                        </Avatar>
                        <div class="grid flex-1 text-left text-sm leading-tight">
                            <span class="truncate font-medium">{{ user.fname + " " + user.lname }}</span>
                            <span class="truncate text-xs">{{ user.email }}</span>
                        </div>
                        <ChevronsUpDown class="ml-auto size-4" />
                    </SidebarMenuButton>
                </DropdownMenuTrigger>
                <DropdownMenuContent
                    class="w-[--reka-dropdown-menu-trigger-width] min-w-48 rounded-lg"
                    :side="isMobile ? 'bottom' : 'right'"
                    align="end"
                    :side-offset="4"
                >
                    <DropdownMenuGroup>
                        <DropdownMenuItem>
                            <CircleUser />
                            Account
                        </DropdownMenuItem>
                        <DropdownMenuItem>
                            <Bell />
                            Notifications
                        </DropdownMenuItem>
                    </DropdownMenuGroup>
                    <DropdownMenuSeparator />
                    <DropdownMenuItem @click="handleLogout"
                            :disabled="logoutForm.processing"
                            class="text-destructive">
                            <LogOut />
                            {{ logoutForm.processing ? 'Logging out...' : 'Log out' }}
                    </DropdownMenuItem>
                </DropdownMenuContent>
            </DropdownMenu>
        </SidebarMenuItem>
    </SidebarMenu>
</template>