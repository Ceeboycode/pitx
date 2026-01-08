<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader } from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Item, ItemMedia } from '@/components/ui/item';

import { Eye, EyeOff, Info, Lock, Mail } from 'lucide-vue-next';

import LoginController from '@/actions/App/Http/Controllers/Auth/LoginController';

// =======================
// Inertia Form
// =======================
const form = useForm({
    email: '',
    password: '',
});

const showPassword = ref(false);

const togglePasswordVisibility = () => {
    showPassword.value = !showPassword.value;
};

const submit = () => {
    form.submit(LoginController.login());
};
</script>

<template>
    <!-- Background Layout -->
    <div class="absolute inset-0 z-0 min-h-screen lg:grid lg:grid-cols-2">
        <div class="relative h-screen bg-[url('/assets/images/guest_bg.png')] bg-cover bg-center">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-blue-900/20"></div>
        </div>

        <div class="hidden items-center justify-center bg-gradient-to-br from-white to-blue-50 lg:flex">
            <div class="h-64 w-64 rounded-full bg-gradient-to-r from-blue-100 to-indigo-100 opacity-50 blur-3xl"></div>
        </div>
    </div>

    <!-- Login Form -->
    <div class="absolute inset-0 z-10 flex min-h-screen items-center justify-center lg:justify-end pb-15">
        <div class="flex justify-center px-4 lg:w-1/2">
            <Card class="mt-16 w-full max-w-[420px] rounded-2xl border border-gray-100 bg-white/95 pt-20 shadow-2xl backdrop-blur-sm">
                <CardHeader class="space-y-2 pb-6 text-center">
                    <h1 class="text-2xl font-bold text-gray-800">Welcome Back</h1>
                    <p class="text-sm text-gray-600">Sign in to your account to continue</p>
                </CardHeader>

                <CardContent class="space-y-6 px-8 pb-8">
                    <form @submit.prevent="submit" class="space-y-4">
                        <!-- Email -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700"> Email Address </label>

                            <div class="relative">
                                <Mail class="absolute top-1/2 left-4 h-5 w-5 -translate-y-1/2 text-gray-400" />

                                <Input
                                    v-model="form.email"
                                    type="email"
                                    placeholder="Enter your email"
                                    autocomplete="email"
                                    class="h-12 rounded-lg pl-12"
                                    :class="{
                                        'border-red-500 focus:ring-red-500/20': form.errors.email,
                                    }"
                                />
                            </div>

                            <Item v-if="form.errors.email" variant="error" size="sm">
                                <ItemMedia class="flex items-center gap-2">
                                    <Info class="h-4 w-4" />
                                    {{ form.errors.email }}
                                </ItemMedia>
                            </Item>
                        </div>

                        <!-- Password -->
                        <div class="space-y-2">
                            <div class="flex items-center justify-between">
                                <label class="text-sm font-medium text-gray-700"> Password </label>
                                <a href="#" class="text-xs text-blue-600 hover:underline"> Forgot password? </a>
                            </div>

                            <div class="relative">
                                <Lock class="absolute top-1/2 left-4 h-5 w-5 -translate-y-1/2 text-gray-400" />

                                <Input
                                    v-model="form.password"
                                    :type="showPassword ? 'text' : 'password'"
                                    placeholder="••••••••"
                                    autocomplete="current-password"
                                    class="h-12 rounded-lg pr-12 pl-12"
                                    :class="{
                                        'border-red-500 focus:ring-red-500/20': form.errors.password,
                                    }"
                                />

                                <button
                                    type="button"
                                    @click="togglePasswordVisibility"
                                    class="absolute top-1/2 right-4 -translate-y-1/2 text-gray-400 hover:text-gray-600"
                                >
                                    <Eye v-if="!showPassword" class="h-5 w-5" />
                                    <EyeOff v-else class="h-5 w-5" />
                                </button>
                            </div>

                            <Item v-if="form.errors.password" variant="error" size="sm">
                                <ItemMedia class="flex items-center gap-2">
                                    <Info class="h-4 w-4" />
                                    {{ form.errors.password }}
                                </ItemMedia>
                            </Item>
                        </div>

                        <!-- Submit -->
                        <Button class="mt-6 h-12 w-full" :disabled="form.processing" variant="blue">
                            {{ form.processing ? 'Signing in…' : 'Sign In' }}
                        </Button>

                        <!-- Footer -->
                        <div class="pt-4 text-center text-xs text-gray-500">
                            Having trouble?
                            <a href="#" class="ml-1 text-blue-600 hover:underline"> Get help </a>
                        </div>
                    </form>
                </CardContent>
            </Card>
        </div>
    </div>
</template>

<style scoped>
input:focus {
    outline: none;
}
</style>
