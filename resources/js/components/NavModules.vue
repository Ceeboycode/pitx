<script setup lang="ts">
import { SidebarGroup, SidebarGroupLabel, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import type { LucideIcon } from 'lucide-vue-next';
const emit = defineEmits<{
    (e: 'navigate', view: string): void;
}>();
defineProps<{
    modules: {
        title: string;
        url: string;
        icon?: LucideIcon;
        isActive?: boolean;
        items?: {
            title: string;
            url: string;
        }[];
    }[];
}>();
</script>

<template>
    <SidebarGroup>
        <SidebarGroupLabel>Modules</SidebarGroupLabel>
        <SidebarMenu>
            <SidebarMenuItem v-for="module in modules" :key="module.title" as-child :default-open="module.isActive">
                <SidebarMenuButton :tooltip="module.title" @click="emit('navigate', module.url)">
                    <component :is="module.icon" v-if="module.icon" />
                    <span>{{ module.title }}</span>
                </SidebarMenuButton>
            </SidebarMenuItem>
        </SidebarMenu>
    </SidebarGroup>
</template>
