<script setup lang="ts">
import { computed } from 'vue'
import type { ComputedRef } from 'vue'
import type { SidebarProps } from '@/components/ui/sidebar'
import { useSidebar, Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarRail } from '@/components/ui/sidebar'
import { Separator } from '@/components/ui/separator'

import NavMain from '@/components/NavMain.vue'
import NavModules from '@/components/NavModules.vue'
import NavUser from '@/components/NavUser.vue'

const props = withDefaults(defineProps<{
  sidebarProps?: SidebarProps
  data: {
    user: {
      fname: string
      lname: string
      email: string
      avatar: string
    }
    navMain: any[]
    navModules: any[]
  }
}>(), {
  sidebarProps: () => ({ collapsible: 'icon' })
})

const emit = defineEmits<{
  (e: 'navigate', view: string): void
}>()

const { state } = useSidebar()!
const isCollapsed: ComputedRef<boolean> = computed(() => state.value === 'collapsed')
</script>

<template>
  <Sidebar v-bind="sidebarProps">
    <SidebarHeader class="">
      <SidebarMenu class="p-2">
          <!-- <SidebarMenuButton size="lg" class="flex flex-row justify-center items-center data-[state=open]:bg-sidebar-accent data-[state=open]:text-sidebar-accent-foreground"> -->
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
                  <!-- <span v-if="!isCollapsed" class="truncate font-medium"> -->
                  <!-- WAG MUNA TANGGALIN, di ko paaa mafigure out pano mapalinis yung text pag nag cocollapse and expand e -->
                  <span
                    :class="[
                      'text-xs font-semibold transition-all duration-200',
                      isCollapsed
                        ? 'truncate max-w-[0] ms-0'    // collapsed: truncate, hidden width
                        : 'whitespace-normal max-w-full ms-2' // expanded: show full text
                    ]"
                  >
                    PARAÑAQUE INTEGRATED TERMINAL EXCHANGE
                  </span>
              </div>
          </SidebarMenuButton>
      </SidebarMenu>

    </SidebarHeader>
    <SidebarContent>
        <NavMain :items="data.navMain" />
        <Separator
            class="my-2"
        />
        <NavModules :modules="data.navModules" @navigate="view => $emit('navigate', view)"/>

    </SidebarContent>
    <SidebarFooter>
        <NavUser :user="data.user" />
    </SidebarFooter>
    <!-- <SidebarRail /> -->
  </Sidebar>
</template>
