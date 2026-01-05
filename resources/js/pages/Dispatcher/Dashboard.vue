<script setup lang="ts">
import AdminSidebar from "@/components/Admin/AdminSidebar.vue"
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbPage,
  BreadcrumbSeparator,
} from "@/components/ui/breadcrumb"
import { Separator } from "@/components/ui/separator"
import {
  SidebarInset,
  SidebarProvider,
  SidebarTrigger,
} from "@/components/ui/sidebar"

import UsersView from '@/pages/Admin/Users/Create.vue'

import { ref } from 'vue'
import type { Component } from 'vue'

const views = {
  // dashboard: DashboardView,
  users: UsersView,
}

type ViewKey = keyof typeof views

const currentView = ref<Component>(views.users)

function switchView(viewKey: ViewKey) {
  const view = views[viewKey]
  if (view) currentView.value = view
}

</script>

<template>
  <SidebarProvider>
    <AdminSidebar @navigate="switchView"/>
    <SidebarInset>
      <header class="sticky top-0 z-20 bg-card flex h-16 shrink-0 items-center gap-2 border-b px-4 ">
        <SidebarTrigger class="-ml-1" />
        <Separator
          orientation="vertical"
          class="mr-2 data-[orientation=vertical]:h-4"
        />
      </header>
      <div class="z-0 flex flex-1 flex-col gap-4 p-4">
        <!-- <component class="min-h-[100vh] flex-1 rounded-xl md:min-h-min bg-red-300" :is="currentView" /> -->
        <!-- ginawa ko lang red yung element para mas makita -->
         <component class="min-h-[100vh] flex-1 rounded-xl md:min-h-min" :is="currentView" />
      </div>
    </SidebarInset>
  </SidebarProvider>

</template>
