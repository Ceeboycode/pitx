<script setup lang="ts">
import { login } from '@/routes';
import { onMounted } from 'vue';

onMounted(() => {
    const revealItems = document.querySelectorAll('.reveal');

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'translate-y-8');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                }
            });
        },
        { threshold: 0.15 },
    );

    revealItems.forEach((el) => observer.observe(el));
});
</script>

<template>
    <Head title="Welcome to PITX" />

    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50">
        <!-- HERO -->
        <section class="relative overflow-hidden">
            <div
                class="absolute inset-0 scale-105 animate-[pan_20s_ease-in-out_infinite_alternate] bg-cover bg-center"
                style="background-image: url('/assets/images/bus.png')"
            ></div>

            <div class="absolute inset-0 bg-white/20 backdrop-blur-sm"></div>

            <!-- NAVBAR -->
            <nav class="relative z-10 animate-[fadeUp_0.8s_ease-out_forwards] px-8 py-6 opacity-0">
                <div class="mx-auto flex max-w-7xl items-center justify-between">
                    <img src="/assets/images/pitx_logo.png" class="h-10" alt="PITX Logo" />
                </div>
            </nav>

            <!-- HERO CONTENT -->
            <div class="relative z-10 mx-auto max-w-7xl px-8 py-28">
                <h1 class="mb-6 animate-[fadeUp_0.8s_ease-out_forwards] text-5xl leading-tight font-extrabold text-gray-900 opacity-0">
                    Life Is Short.<br />
                    <span class="text-red-600">The Station Is Busy.</span>
                </h1>

                <p class="mb-10 max-w-xl animate-[fadeUp_0.8s_ease-out_forwards] text-lg text-gray-700 opacity-0 [animation-delay:200ms]">
                    A centralized operations system for PITX administrators, dispatchers, and cashiers—built for speed, accuracy, and control.
                </p>

                <div class="animate-[fadeUp_0.8s_ease-out_forwards] opacity-0 [animation-delay:400ms]">
                    <Link
                        :href="login().url"
                        class="inline-flex animate-[pulseRed_2s_infinite] items-center gap-2 rounded-lg bg-gradient-to-r from-red-600 to-red-700 px-10 py-4 font-semibold text-white shadow-lg transition hover:scale-105 hover:from-red-700 hover:to-red-800 active:scale-95"
                    >
                        Access System
                    </Link>
                </div>
            </div>
        </section>

        <!-- ROLES -->
        <section class="border-t border-gray-100 bg-white py-24">
            <div class="mx-auto max-w-6xl px-6">
                <h2 class="mb-4 text-center text-3xl font-bold text-gray-800">System User Roles</h2>
                <p class="mb-14 text-center text-gray-600">Each role is designed to support efficient and secure terminal operations.</p>

                <div class="grid gap-8 md:grid-cols-3">
                    <div class="reveal rounded-2xl border bg-white p-8 shadow-sm transition hover:-translate-y-2 hover:shadow-md">
                        <div class="mb-4 h-1 w-12 rounded-full bg-red-600"></div>
                        <h3 class="mb-3 text-xl font-semibold">Administrator</h3>
                        <p class="text-gray-600">Manages system configuration, user access, and overall PITX operations.</p>
                    </div>

                    <div class="reveal rounded-2xl border bg-white p-8 shadow-sm transition hover:-translate-y-2 hover:shadow-md">
                        <div class="mb-4 h-1 w-12 rounded-full bg-red-600"></div>
                        <h3 class="mb-3 text-xl font-semibold">Dispatcher</h3>
                        <p class="text-gray-600">Oversees bus dispatching, schedules, and real-time terminal activity.</p>
                    </div>

                    <div class="reveal rounded-2xl border bg-white p-8 shadow-sm transition hover:-translate-y-2 hover:shadow-md">
                        <div class="mb-4 h-1 w-12 rounded-full bg-red-600"></div>
                        <h3 class="mb-3 text-xl font-semibold">Cashier</h3>
                        <p class="text-gray-600">Handles ticketing, payments, and passenger transaction processing.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- MAP (FIXED & ROUNDED) -->
        <section class="border-t border-gray-100 bg-white py-24">
            <div class="mx-auto max-w-6xl px-6">
                <h2 class="mb-4 text-center text-3xl font-bold text-gray-800">PITX Location</h2>
                <p class="mb-12 text-center text-gray-600">Parañaque Integrated Terminal Exchange — main transport hub serving Metro Manila.</p>

                <div class="mx-auto max-w-3xl overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">
                    <div class="aspect-[16/9]">
                        <img src="/assets/images/map.png" alt="Map showing PITX location" class="h-full w-full object-contain" />
                    </div>
                </div>

                <p class="mt-4 text-center text-sm text-gray-500">Map data © OpenStreetMap contributors</p>
            </div>
        </section>

        <!-- SECURITY -->
        <section class="bg-indigo-600 py-24">
            <div class="reveal mx-auto max-w-4xl px-6 text-center text-white">
                <h2 class="mb-6 inline-block rounded-full bg-white/10 px-6 py-2 text-3xl font-bold">Authorized Personnel Only</h2>
                <p class="text-indigo-100">
                    This system is restricted to official PITX staff. All access and activities are logged for security and compliance.
                </p>
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="bg-gray-900 py-6 text-center text-sm text-gray-400">
            © 2026 Parañaque Integrated Terminal Exchange. All rights reserved.
        </footer>
    </div>
</template>

<style>
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(24px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pan {
    from {
        transform: scale(1.05) translateX(0);
    }
    to {
        transform: scale(1.1) translateX(-20px);
    }
}

@keyframes pulseRed {
    0%,
    100% {
        box-shadow: 0 0 0 0 rgba(220, 38, 38, 0.5);
    }
    50% {
        box-shadow: 0 0 0 14px rgba(220, 38, 38, 0);
    }
}
</style>
