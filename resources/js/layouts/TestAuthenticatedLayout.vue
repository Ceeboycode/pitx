<script setup lang="ts">
import { shallowRef, computed, onMounted, markRaw } from 'vue'
import type { Component, ComputedRef } from 'vue'

// Components
import AdminSidebar from "@/components/Admin/AdminSidebar.vue"
import NavMain from '@/components/NavMain.vue'
import NavModules from '@/components/NavModules.vue'
import NavUser from '@/components/NavUser.vue'

// UI imports
import { Separator } from "@/components/ui/separator"
import { SidebarProvider, Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarInset, SidebarTrigger, useSidebar, SidebarMenuButton, SidebarMenu } from '@/components/ui/sidebar'
import { Head } from '@inertiajs/vue3'

// Pages imports
import UsersView from '@/pages/Admin/Users/Create.vue'
import VehicleTypeView from '@/pages/Dispatcher/VehicleType/Create.vue'

// Views mapping
// const views = {
//   users: UsersView,
//   vehicle_type: VehicleTypeView
// }

const views = {
  users: markRaw(UsersView),
  vehicle_type: markRaw(VehicleTypeView)
}

type ViewKey = keyof typeof views

// Default view
const currentView = shallowRef<Component>(views.users)
function switchView(viewKey: ViewKey) {
  const view = views[viewKey]
  if (view) currentView.value = view
}

// Hardcoded user
const user = {
  name: 'Admin User',
  role: 'Admin'
}

// Props
const props = withDefaults(defineProps<{
  sidebarProps?: any
  data: {
    user: { fname: string; lname: string; email: string; avatar: string }
    navMain: any[]
    navModules: any[]
  }
}>(), {
  sidebarProps: () => ({ collapsible: 'icon' })
})

const { data, sidebarProps } = props

const emit = defineEmits<{
  (e: 'navigate', view: string): void
}>()

// Handle navigation from sidebar
function handleNavigate(view: string) {
  console.log('Navigate to:', view)
  emit('navigate', view)
}

let isCollapsed: ComputedRef<boolean> | undefined
onMounted(() => {
  const sidebar = useSidebar()
  if (sidebar) {
    isCollapsed = computed(() => sidebar.state.value === 'collapsed')
  }
})

// const sidebar = useSidebar() // get sidebar context
// const isCollapsed = computed(() => sidebar?.state.value === 'collapsed') // optional chaining just in case

</script>

<template>
  <Head :title="user.role" />

  <SidebarProvider>
    <Sidebar v-bind="sidebarProps" @navigate="handleNavigate">

      <SidebarHeader>
        <SidebarMenu>
          <SidebarMenuButton
            size="lg"
            class="flex items-center gap-2 justify-center transition-all duration-200"
          >
            <!-- Logo -->
            <div
              class="flex h-8 w-8 items-center justify-center rounded-lg overflow-hidden"
            >
              <img src="../../../public/assets/images/logo_cropped.jpeg" alt="PITX" class="w-full h-full object-cover">
            </div>

            <!-- Text -->
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

      <!-- <SidebarHeader>
        <SidebarMenu class="">
            <SidebarMenuButton
                size="lg"
                :class="!isCollapsed ? 'flex items-center gap-2 justify-center' : 'flex items-center justify-center'"
            >

                <div
                    class="flex h-8 aspect-square size-8 items-center justify-center rounded-lg text-sidebar-primary-foreground"
                >
                  <img src="../../../public/assets/images/logo_cropped.jpeg" alt="PITX" class="w-full">
                </div>
                <div class="w-full grid flex-1 text-left text-sm leading-tight">
                    <span
                      v-if="!isCollapsed"
                      :class="[
                        'text-xs font-semibold transition-all duration-200',
                        isCollapsed
                          ? 'truncate max-w-[0] ps-2'
                          : 'whitespace-normal max-w-full ps-2'
                      ]"
                    >
                      PARAÑAQUE INTEGRATED TERMINAL EXCHANGE
                    </span>
                </div>
            </SidebarMenuButton>
        </SidebarMenu>
      </SidebarHeader> -->

      <SidebarContent>
        <NavMain :items="data.navMain" />
        <Separator class="my-2" />
        <NavModules :modules="data.navModules" @navigate="view => $emit('navigate', view)" />
      </SidebarContent>

      <SidebarFooter>
        <NavUser :user="data.user" />
      </SidebarFooter>
    </Sidebar>

    <SidebarInset>
      <header class="sticky top-0 z-20 bg-card flex h-16 shrink-0 items-center gap-2 border-b px-4">
        <SidebarTrigger class="-ml-1" />
        <Separator orientation="vertical" class="mr-2 data-[orientation=vertical]:h-4" />
      </header>

      <div class="z-0 flex flex-1 flex-col gap-4 p-4">
        <!-- <component class="min-h-[100vh] flex-1 rounded-xl md:min-h-min bg-red-300" :is="currentView" /> -->
        <!-- ginawa ko lang red yung element para mas makita -->
        <component class="min-h-[100vh] flex-1 rounded-xl md:min-h-min" :is="currentView" />
      </div>
    </SidebarInset>
  </SidebarProvider>
</template>
