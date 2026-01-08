<script setup lang="ts">
import { SidebarGroup, SidebarGroupLabel, SidebarMenu, SidebarMenuButton, SidebarMenuItem, SidebarMenuSub, SidebarMenuSubButton, SidebarMenuSubItem } from '@/components/ui/sidebar';
import { LucideIcon, ChevronRight } from 'lucide-vue-next';
// import { CollapsibleTrigger, CollapsibleContent } from 'reka-ui';
import { Collapsible, CollapsibleTrigger, CollapsibleContent } from '@/components/ui/collapsible' // adjust path

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
            <template v-for="module in modules" :key="module.title">

                <Collapsible
                v-if="module.items?.length"
                as-child
                :default-open="module.isActive"
                class="group/collapsible"
                >
                    <SidebarMenuItem>
                        <!-- Collapsible header -->
                        <CollapsibleTrigger as-child>
                        <SidebarMenuButton :tooltip="module.title">
                            <component :is="module.icon" v-if="module.icon" />
                            <span>{{ module.title }}</span>
                            <ChevronRight
                            class="ml-auto transition-transform duration-200 group-data-[state=open]/collapsible:rotate-90"
                            />
                        </SidebarMenuButton>
                        </CollapsibleTrigger>

                        <!-- Collapsible content -->
                        <CollapsibleContent>
                        <SidebarMenuSub>
                            <SidebarMenuSubItem v-for="subItem in module.items" :key="subItem.title">
                            <SidebarMenuSubButton as-child>
                                <a :href="subItem.url">
                                <span>{{ subItem.title }}</span>
                                </a>
                            </SidebarMenuSubButton>
                            </SidebarMenuSubItem>
                        </SidebarMenuSub>
                        </CollapsibleContent>
                    </SidebarMenuItem>
                </Collapsible>

                <!-- If the module has no child items, render as normal button -->
                <SidebarMenuItem v-else as-child :default-open="module.isActive">
                    <SidebarMenuButton
                        :tooltip="module.title"
                        @click="$emit('navigate', module.url)"
                    >
                        <component :is="module.icon" v-if="module.icon" />
                        <span>{{ module.title }}</span>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </template>
        </SidebarMenu>

    </SidebarGroup>
</template>
