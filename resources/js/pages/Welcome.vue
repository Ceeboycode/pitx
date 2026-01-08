<script setup lang="ts">
import { login } from '@/routes';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth.user);

const dashboardUrl = computed(() => user.value?.dashboard_url ?? null);
</script>

<template>
    <Head title="Welcome to PITX" />

    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50">
        <!-- NAVBAR -->
        <nav class="flex items-center justify-between px-8 py-6">
            <h1 class="text-xl font-bold text-gray-800">PITX</h1>

            <Link :href="login().url" class="rounded-lg bg-indigo-600 px-5 py-2 text-sm font-medium text-white shadow transition hover:bg-indigo-700">
                Login
            </Link>
        </nav>

        <!-- HERO SECTION -->
        <section class="mx-auto max-w-7xl px-8 py-20">
            <div class="grid items-center gap-12 md:grid-cols-2">
                <!-- LEFT CONTENT -->
                <div>
                    <h2 class="mb-4 text-4xl leading-tight font-extrabold text-gray-900">
                        Life Is Short And <br />
                        <span class="text-indigo-600">The Station Is Busy!</span>
                    </h2>

                    <p class="mb-8 max-w-xl text-lg text-gray-600">
                        Easily manage bus dispatches, monitor real-time schedules, and improve terminal operations at the Parañaque Integrated
                        Terminal Exchange.
                    </p>

                    <div class="flex gap-4">
                        <Link
                            :href="login().url"
                            class="rounded-lg bg-indigo-600 px-8 py-3 font-medium text-white shadow transition hover:bg-indigo-700"
                        >
                            Get Started
                        </Link>

                        <a
                            href="#features"
                            class="rounded-lg border border-gray-300 px-8 py-3 font-medium text-gray-700 transition hover:bg-gray-100"
                        >
                            Learn More
                        </a>
                    </div>
                </div>

                <!-- RIGHT IMAGE -->
                <div class="relative">
                    
                </div>
            </div>
        </section>

        <!-- FEATURES SECTION -->
        <section id="features" class="bg-white py-20">
            <div class="mx-auto max-w-6xl px-6">
                <h3 class="mb-12 text-center text-3xl font-bold text-gray-800">Key Features</h3>

                <div class="grid gap-8 md:grid-cols-3">
                    <div class="rounded-xl border border-gray-200 p-6 shadow-sm transition hover:shadow-md">
                        <h4 class="mb-2 text-lg font-semibold text-gray-800">Centralized Dispatch</h4>
                        <p class="text-sm text-gray-600">Automate bus dispatching to reduce manual errors and improve terminal efficiency.</p>
                    </div>

                    <div class="rounded-xl border border-gray-200 p-6 shadow-sm transition hover:shadow-md">
                        <h4 class="mb-2 text-lg font-semibold text-gray-800">Driver Access</h4>
                        <p class="text-sm text-gray-600">Drivers can view schedules and log dispatches anytime, even without dispatchers.</p>
                    </div>

                    <div class="rounded-xl border border-gray-200 p-6 shadow-sm transition hover:shadow-md">
                        <h4 class="mb-2 text-lg font-semibold text-gray-800">Real-time Monitoring</h4>
                        <p class="text-sm text-gray-600">Monitor live bus statuses, terminal activity, and alerts in one dashboard.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ABOUT SECTION -->
        <section class="py-20">
            <div class="mx-auto max-w-4xl px-6 text-center">
                <h3 class="mb-4 text-3xl font-bold text-gray-800">About PITX</h3>
                <p class="leading-relaxed text-gray-600">
                    The Parañaque Integrated Terminal Exchange is a centralized transportation hub designed to organize bus operations and improve
                    commuter safety using modern digital systems.
                </p>
            </div>
        </section>

        <!-- CTA SECTION -->
        <section class="bg-indigo-600 py-16">
            <div class="mx-auto max-w-4xl px-6 text-center text-white">
                <h3 class="mb-4 text-3xl font-bold">Ready to Access the System?</h3>
                <p class="mb-6 text-indigo-100">Log in to manage dispatches, track buses, and monitor terminal activity.</p>

                <Link
                    :href="login().url"
                    class="inline-block rounded-lg bg-white px-8 py-3 font-medium text-indigo-600 shadow transition hover:bg-gray-100"
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
