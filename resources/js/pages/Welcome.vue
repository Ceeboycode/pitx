<script setup lang="ts">
import { login } from '@/routes';
</script>

<template>
  <Head title="Welcome to PITX" />

   <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50"> 

    <!-- HERO + NAVBAR (SHARED BACKGROUND) -->
<section class="relative w-full overflow-hidden">

  <!-- BACKGROUND IMAGE -->
  <div
    class="absolute inset-0 bg-cover bg-center"
    style="background-image: url('/assets/images/bus.png')"
  ></div>

  <!-- OVERLAY -->
  <div class="absolute inset-0 bg-white/1 backdrop-blur-sm"></div>

  <!-- NAVBAR -->
  <nav class="relative z-10 w-full px-8 py-6">
  <div class="mx-auto max-w-7xl flex items-center justify-between">
    
    <h1 class="text-2xl font-bold tracking-tight">
      <span class="bg-gradient-to-r from-indigo-600 to-blue-600 bg-clip-text text-transparent">
        PITX
      </span>
    </h1>

    <Link
      :href="login().url"
      class="rounded-full bg-gradient-to-r from-indigo-600 to-blue-600 px-8 py-3 text-white font-semibold shadow-lg hover:from-indigo-700 hover:to-blue-700 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5"
    >
      Login
    </Link>

  </div>
</nav>


  <!-- HERO CONTENT -->
  <div class="relative z-10 mx-auto max-w-7xl px-8 py-24">
    <div class="grid items-center gap-12 md:grid-cols-2">

      <!-- LEFT CONTENT -->
      <div>
        <h2 class="mb-4 text-4xl font-extrabold text-gray-900 leading-tight">
          Life Is Short And <br />
          <span class="text-indigo-600">The Station Is Busy!</span>
        </h2>

        <p class="mb-8 max-w-xl text-black-700 text-lg">
          Easily manage bus dispatches, monitor real-time schedules,
          and improve terminal operations at the Parañaque Integrated
          Terminal Exchange.
        </p>

        <div class="flex gap-4">
          <Link
            :href="login().url"
            class="rounded-lg bg-indigo-600 px-8 py-3 text-white font-medium shadow hover:bg-indigo-700 transition"
          >
            Get Started
          </Link>

          <a
            href="#features"
            class="rounded-lg border border-gray-300 bg-white/70 px-8 py-3 text-gray-700 font-medium hover:bg-gray-100 transition"
          >
            Learn More
          </a>
        </div>
      </div>

      <!-- RIGHT SPACE -->
      <div class="hidden md:block"></div>

    </div>
  </div>
</section>

  


    <!-- FEATURES SECTION -->
    <section id="features" class="bg-white py-20">
      <div class="mx-auto max-w-6xl px-6">
        <h3 class="mb-12 text-center text-3xl font-bold text-gray-800">
          Key Features
        </h3>

        <div class="grid gap-8 md:grid-cols-3">
          <div class="rounded-xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition">
            <h4 class="mb-2 text-lg font-semibold text-gray-800">
              Centralized Dispatch
            </h4>
            <p class="text-sm text-gray-600">
              Automate bus dispatching to reduce manual errors and improve
              terminal efficiency.
            </p>
          </div>

          <div class="rounded-xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition">
            <h4 class="mb-2 text-lg font-semibold text-gray-800">
              Driver Access
            </h4>
            <p class="text-sm text-gray-600">
              Drivers can view schedules and log dispatches anytime,
              even without dispatchers.
            </p>
          </div>

          <div class="rounded-xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition">
            <h4 class="mb-2 text-lg font-semibold text-gray-800">
              Real-time Monitoring
            </h4>
            <p class="text-sm text-gray-600">
              Monitor live bus statuses, terminal activity, and alerts
              in one dashboard.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- ABOUT SECTION -->
    <section class="py-20">
      <div class="mx-auto max-w-4xl px-6 text-center">
        <h3 class="mb-4 text-3xl font-bold text-gray-800">
          About PITX
        </h3>
        <p class="text-gray-600 leading-relaxed">
          The Parañaque Integrated Terminal Exchange is a centralized
          transportation hub designed to organize bus operations and
          improve commuter safety using modern digital systems.
        </p>
      </div>
    </section>

    <!-- CTA SECTION -->
    <section class="bg-indigo-600 py-16">
      <div class="mx-auto max-w-4xl px-6 text-center text-white">
        <h3 class="mb-4 text-3xl font-bold">
          Ready to Access the System?
        </h3>
        <p class="mb-6 text-indigo-100">
          Log in to manage dispatches, track buses, and monitor terminal activity.
        </p>

        <Link
          :href="login().url"
          class="inline-block rounded-lg bg-white px-8 py-3 font-medium text-indigo-600 shadow hover:bg-gray-100 transition"
        >
          Login to PITX
        </Link>
      </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-900 py-6 text-center text-sm text-gray-400">
      © 2026 Parañaque Integrated Terminal Exchange. All rights reserved.
    </footer>

  </div>
</template>
