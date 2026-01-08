<template>
    <Head title="Admin" />
    <SidebarProvider>
        <div class="flex min-h-screen w-full">

            <AppSidebar :user="data.user" :items="data.items" :modules="data.modules"/>

            <div class="flex flex-1 flex-col">
                <main class="">
                    <AppSidebarInset />
                    <slot />

                </main>
            </div>
        </div>
    </SidebarProvider>
</template>

<script setup>
import { Head } from '@inertiajs/vue3'
import { reactive } from 'vue';
import UserController from '@/actions/App/Http/Controllers/Admin/UserController';

let userCreateUrl = ''
try {
  userCreateUrl = UserController.create()?.url || '#'
} catch (e) {
  console.error('Failed to get UserController.create url:', e)
  userCreateUrl = '#'
}

import AppSidebar from '@/components/AppSidebar.vue';
import AppSidebarInset from '@/components/AppSidebarInset.vue';
import { SidebarProvider, SidebarTrigger } from '@/components/ui/sidebar';
import { LayoutDashboard, Users, BusFront, BookOpen, PieChart, Settings2 } from 'lucide-vue-next'

const data = reactive({
    roles: {
        id: 1,
        name: 'Admin'
    },
    user: {
        fname: 'alex',
        lname: 'smith',
        email: 'sample@example.com',
        avatar: '/assets/images/cat.jpg',
        role: 'Admin'
    },
    items: [
    {
      title: 'Documentation',
      url: '#',
      icon: BookOpen,
      isActive: false,
      items: [
        { title: 'Tutorials', url: '#', isActive: false },
        { title: 'Changelog', url: '#', isActive: false}
      ]
    },
    {
      title: 'Settings',
      url: '/admin/settings',
      icon: Settings2,
      isActive: false,
      items: [{ title: 'General', url: '#', isActive: false }]
    }
  ],
    modules: [
    {
        title: 'Dashboard',
        url: '/admin/dashboard',
        icon: LayoutDashboard,
        isActive: false },
    {
        title: 'User Management',
        url: userCreateUrl,
        icon: Users,
        isActive: true },
    {
        title: 'Vehicle Information',
        url: '#',
        icon: BusFront ,
        isActive: false,
        items: [
            {
                title: 'Vehicle Types',
                url: '#',
                isActive: false
            }
        ],
    },
    { title: 'Terminal Fee', url: '#', icon: BookOpen },
    {
        title: 'Reports',
        url: '#',
        icon: PieChart,
        isActive: false,
        // items: [
            //     {
            //         title: 'Tutorials',
            //         url: '#',
            //     }
            // ],
     }
  ]
})

</script>
