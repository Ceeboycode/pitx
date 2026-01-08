<script setup lang="ts">
import CustomSidebar from '@/components/CustomSidebar.vue'
import { LayoutDashboard, Users, BusFront, BookOpen, PieChart, Settings2 } from 'lucide-vue-next'

import { index as vehicleTypeIndex} from '@/routes/vehicle-types/index'
import { index as companyIndex} from '@/routes/companies/index'

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
    { title: 'User Management', url: '', icon: Users },
    {
        title: 'Vehicle Information',
        url: '#',
        icon: BusFront ,
        items: [
            {
                title: 'Vehicle Types',
                url: vehicleTypeIndex,
            }
        ],
    },
    { title: 'Terminal Fee', url: '#', icon: BookOpen },
    {
        title: 'Reports',
        url: '#',
        icon: PieChart,
        // items: [
            //     {
            //         title: 'Tutorials',
            //         url: '#',
            //     }
            // ],
     }
  ]
}

function handleNavigate(view: string) {
  console.log('Navigate to:', view)
}
</script>

<template>
  <CustomSidebar :data="data" @navigate="handleNavigate" />
</template>
