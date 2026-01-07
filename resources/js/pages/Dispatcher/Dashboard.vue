<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import DispatcherSidebar from "@/components/Dispatcher/DispatcherSidebar.vue"
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

import VehicleTypeView from '@/pages/Dispatcher/VehicleType/Create.vue'
//tanggalin to, not for dispatchers

import { ref } from 'vue'
import type { Component } from 'vue'

const views = {
  // dashboard: DashboardView,
  vehicle_types: VehicleTypeView,
  //tanggalin to, not for dispatchers
}

type ViewKey = keyof typeof views

const currentView = ref<Component>(views.vehicle_types) //tanggalin to, not for dispatchers

function switchView(viewKey: ViewKey) {
  const view = views[viewKey]
  if (view) currentView.value = view
}

</script>

<template>
  <Head title="Dispatcher" />
  <SidebarProvider>
    <DispatcherSidebar @navigate="switchView"/>
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