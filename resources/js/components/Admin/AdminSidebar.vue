<script setup lang="ts">
import type { Ref, ComputedRef } from 'vue'
import  { computed } from 'vue'
import type { SidebarProps } from '@/components/ui/sidebar';
import { useSidebar } from '@/components/ui/sidebar';

import NavMain from '@/components/NavMain.vue';
import NavModules from '@/components/NavModules.vue';
import NavUser from '@/components/NavUser.vue';
import { AudioWaveform, BookOpen, Bot, Command, Frame, GalleryVerticalEnd, Map, PieChart, Settings2, SquareTerminal } from 'lucide-vue-next';

import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarRail } from '@/components/ui/sidebar';

const props = withDefaults(defineProps<SidebarProps>(), {
    collapsible: 'icon',
});

const { state } = useSidebar()!
const isCollapsed: ComputedRef<boolean> = computed(() => state.value === 'collapsed')

// di pa naaayos yung icons:)
const data = {
    user: {
        fname: 'alex',
        lname: 'smith',
        email: 'sample@example.com',
        avatar: '/public/assets/images/cat.png',
    },
    navMain: [
        {
            title: 'Documentation',
            url: '#',
            icon: BookOpen,
            items: [
                {
                    title: 'Tutorials', //balak lagyan to after everything is done
                    url: '#',
                },
                {
                    title: 'Changelog', //balak lagyan din, to sort out na lang pag apos na main thesis
                    url: '#',
                },
            ],
        },
        {
            title: 'Settings',
            url: '#',
            icon: Settings2,
            items: [
                {
                    title: 'General',
                    url: '#',
                },
            ],
        },
    ],
    navModules:[
        {
            title: 'User Management',
            url: '#',
            icon: BookOpen,
            // items: [
            //     {
            //         title: 'Tutorials',
            //         url: '#',
            //     }
            // ],
        },
    ]
};
</script>

<template>
    <Sidebar v-bind="props">
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
                    <img src="../../../../public/assets/images/logo_cropped.jpeg" alt="PITX" class="w-full">
                  </div>
                  <div class="w-full grid flex-1 text-left text-sm leading-tight">
                      <!-- <span v-if="!isCollapsed" class="truncate font-medium"> -->
                      <!-- WAG MUNA TANGGALIN, di ko paaa mafigure out pano mapalinis yung text pag nag cocollapse and expand e -->
                      <span
                        :class="[
                          'font-medium transition-all duration-200',
                          isCollapsed
                            ? 'truncate max-w-[0]'    // collapsed: truncate, hidden width
                            : 'whitespace-normal max-w-full' // expanded: show full text
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
            <NavModules :modules="data.navModules" @navigate="view => $emit('navigate', view)"/>

        </SidebarContent>
        <SidebarFooter>
            <NavUser :user="data.user" />
        </SidebarFooter>
        <SidebarRail />
    </Sidebar>
</template>