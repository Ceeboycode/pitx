<script setup lang="ts">
import { shallowRef, computed, onMounted, markRaw } from 'vue'
import type { Component, ComputedRef } from 'vue'
import { Bell, ChevronRight, ChevronsUpDown, LogOut, CircleUser } from 'lucide-vue-next';
import { logout } from '@/actions/App/Http/Controllers/Auth/LoginController';
import { useForm, Link } from '@inertiajs/vue3';
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
    SidebarMenuSub,
    SidebarMenuSubButton,
    SidebarMenuSubItem,
    useSidebar
} from '@/components/ui/sidebar';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuGroup,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { Separator } from './ui/separator';
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
// import { Separator } from 'reka-ui';
import { Collapsible, CollapsibleContent, CollapsibleTrigger } from '@/components/ui/collapsible';

// import UserController from '@/actions/App/Http/Controllers/Admin/UserController';

// const { user, items, modules } = defineProps<{
const props = defineProps<{
    user: {
        fname: string;
        lname: string;
        email: string;
        avatar: string;
        role: string;
    };
    items: {
        title: string;
        url: string;
        icon?: any;
        isActive?: boolean;
        items?: {
            title: string;
            url: string;
            isActive?: boolean;
        }[];
    }[];
    modules: {
        title: string;
        url: string;
        icon?: any;
        isActive?: boolean;
        items?: {
            title: string;
            url: string;
            isActive?: boolean;
        }[];
    }[];
}>();

let isCollapsed: ComputedRef<boolean> | undefined
onMounted(() => {
  const sidebar = useSidebar()
  if (sidebar) {
    isCollapsed = computed(() => sidebar.state.value === 'collapsed')
  }
})

// const { isMobile, state } = useSidebar();
// const isCollapsed = computed(() => state.value === 'collapsed');

const sidebarProps = () => ({
  collapsible: 'icon'
})

const logoutForm = useForm({});
const handleLogout = () => {
    // logoutForm.post(logout().url);
    logoutForm.post(logout()?.url ?? '#');
};

const { isMobile } = useSidebar();

// const { data, sidebarProps } = props

const emit = defineEmits<{
  (e: 'navigate', view: string): void
}>()

function handleNavigate(view: string) {
  console.log('Navigate to:', view)
  emit('navigate', view)
}

</script>

<template>
    <!-- <Sidebar :user="user" :items="items" :modules="modules" @navigate="handleNavigate"> -->
    <Sidebar v-bind="sidebarProps()" @navigate="handleNavigate">

      <SidebarHeader>
        <SidebarMenu class="py-2">
          <SidebarMenuButton
            size="lg"
            class="flex items-center gap-2 justify-center transition-all duration-200"
          >
            <div
              class="flex h-8 w-8 items-center justify-center rounded-lg overflow-hidden"
            >
              <img src="../../../public/assets/images/logo_cropped.jpeg" alt="PITX" class="w-full" />
            </div>

            <transition name="fade-slide">
              <span
                v-if="!isCollapsed"
                class="text-xs font-semibold ps-2 whitespace-normal"
              >
                PARAÑAQUE INTEGRATED TERMINAL EXCHANGE
              </span>
            </transition>
          </SidebarMenuButton>
        </SidebarMenu>
      </SidebarHeader>

      <SidebarContent>
        <!-- <NavMain :items="data.navMain" /> -->
        <SidebarGroup>
            <SidebarGroupLabel>Platform</SidebarGroupLabel>
            <SidebarMenu>
                <Collapsible
                    v-for="item in items"
                    :key="item.title"
                    as-child
                    :default-open="item.isActive"
                    class="group/collapsible"
                >
                    <SidebarMenuItem>
                        <CollapsibleTrigger as-child>
                            <SidebarMenuButton :tooltip="item.title">
                                <component :is="item.icon" v-if="item.icon" />
                                <span>{{ item.title }}</span>
                                <ChevronRight class="ml-auto transition-transform duration-200 group-data-[state=open]/collapsible:rotate-90" />
                            </SidebarMenuButton>
                        </CollapsibleTrigger>
                        <CollapsibleContent>
                            <SidebarMenuSub>
                                <!-- <SidebarMenuSubItem v-for="subItem in item.items" :key="subItem.title"> -->
                                <SidebarMenuSubItem v-for="subItem in item.items ?? []" :key="subItem.title">
                                    <SidebarMenuSubButton as-child>
                                        <Link :href="subItem.url">
                                            <span>{{ subItem.title }}</span>
                                        </Link>
                                    </SidebarMenuSubButton>
                                </SidebarMenuSubItem>
                            </SidebarMenuSub>
                        </CollapsibleContent>
                    </SidebarMenuItem>
                </Collapsible>
            </SidebarMenu>
        </SidebarGroup>

        <Separator class="my-2" />

        <!-- <NavModules :modules="data.navModules" @navigate="view => $emit('navigate', view)" /> -->

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
                                <SidebarMenuSubItem v-for="subItem in module.items ?? []" :key="subItem.title">
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
      </SidebarContent>

      <SidebarFooter>
        <!-- <NavUser :user="data.user" /> -->
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
      </SidebarFooter>
    </Sidebar>
</template>
