<script setup lang="ts">
import CustomSidebar from '@/components/CustomSidebar.vue'
import { LayoutDashboard, Users, BusFront, BookOpen, PieChart, Settings2, ListChecks } from 'lucide-vue-next'

const data = {
  user: {
    fname: 'alex',
    lname: 'smith',
    email: 'sample@example.com',
    avatar: '/assets/images/cat.jpg'
  },
  navMain: [
    {
      title: 'Documentation',
      url: '#',
      icon: BookOpen,
      items: [
        { title: 'Tutorials', url: '#' },
        { title: 'Changelog', url: '#' }
      ]
    },
    {
      title: 'Settings',
      url: '#',
      icon: Settings2,
      items: [{ title: 'General', url: '#' }]
    }
  ],
  navModules: [
    { title: 'Dashboard', url: '#', icon: LayoutDashboard },
    {
        title: 'Dispatch Management',
        url: '#',
        icon: ListChecks,
        // items: [
            //     {
            //         title: 'Tutorials',
            //         url: '#',
            //     }
            // ],
     }
  ]
}

// function handleNavigate(view: string) {
//   console.log('Navigate to:', view)
// }
</script>

<template>
  <!-- <CustomSidebar :data="data" @navigate="handleNavigate" /> -->
</template>
