<script setup lang="ts">
import type { SidebarProps } from '@/components/ui/sidebar';
import NavMain from '@/components/NavMain.vue';
import NavModules from '@/components/NavModules.vue';
import NavUser from '@/components/NavUser.vue';
import { AudioWaveform, BookOpen, Bot, Command, Frame, GalleryVerticalEnd, Map, PieChart, Settings2, SquareTerminal } from 'lucide-vue-next';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarRail } from '@/components/ui/sidebar';
const props = withDefaults(defineProps<SidebarProps>(), {
    collapsible: 'icon',
});
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
        <SidebarHeader>
          <SidebarMenu>
              <SidebarMenuButton size="lg" class="">
                  <div
                      class="flex m-2 h-8 items-center justify-center rounded-lg"
                  >
                  <img src="../../../../public/assets/images/logo_text.png" alt="PITX" class="w-full">
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
