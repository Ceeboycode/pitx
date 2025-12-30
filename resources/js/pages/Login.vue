<script setup lang="ts">
import { Button } from "@/components/ui/button"
import { Input } from "@/components/ui/input"
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card"
import { Checkbox } from "@/components/ui/checkbox"

// =================================================

import { useForm } from '@inertiajs/vue3';
import LoginController from '@/actions/App/Http/Controllers/Auth/LoginController';


let form = useForm({
    email: '',
    password: '',
});

const submit = () => {
    form.submit(LoginController.login())
}
</script>

<template>
    <div class="min-h-screen lg:grid lg:grid-cols-2 absolute inset-0 z-0">
        <div class="h-screen relative bg-[url('/public/assets/images/guest_bg.png')] bg-cover bg-center">
        </div>
        <div class="hidden lg:block flex items-center justify-center bg-white">
        </div>
    </div>
    <div class="min-h-screen min-w-screen absolute inset-0 z-10 flex justify-center items-center lg:justify-end">
        <div class="lg:w-1/2 flex justify-center">
            <Card class="w-[380px] shadow-xl">
                <CardHeader class="">
                    <img src="../../../public/assets/images/logo_text.png" alt="PITX LOGO" class="w-50">
                    <!-- <h1 class="font-bold">Welcome back!</h1>
                    <h2 class="font-bold">Welcome back!</h2>
                    <h3 class="font-bold">Welcome back!</h3>
                    <h4 class="font-bold">Welcome back!</h4>
                    <h5 class="font-bold">Welcome back!</h5> -->
                    <h6 class="font-bold">Welcome back!</h6>
                    <p class="text-muted-foreground">Login</p>
                </CardHeader>

                <CardContent class="space-y-4">

                    <Input placeholder="Enter your email" v-model="form.email" />
                    <p v-if="form.errors.email" class="mt-1 text-sm text-red-600">
                        {{ form.errors.email }}
                    </p>

                    <Input type="password" placeholder="Enter your password" v-model="form.password" />
                    <p v-if="form.errors.password" class="mt-1 text-sm text-red-600">
                        {{ form.errors.password }}
                    </p>
                    
                    <Button class="w-full mt-2" @click="submit">
                        Login
                    </Button>
                </CardContent>

            </Card>
        </div>
    </div>
    <!-- <Head title="Login" /> -->

    <!-- <div class="flex min-h-screen items-center justify-center bg-gray-100">
        <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-md">
            <h1 class="mb-6 text-center text-2xl font-semibold text-gray-800">Login</h1>

            <form @submit.prevent="submit" class="space-y-5">

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>

                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="mt-1 block w-full rounded-md border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    />

                    <p v-if="form.errors.email" class="mt-1 text-sm text-red-600">
                        {{ form.errors.email }}
                    </p>
                </div>


                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>

                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full rounded-md border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    />

                    <p v-if="form.errors.password" class="mt-1 text-sm text-red-600">
                        {{ form.errors.password }}
                    </p>
                </div>


                <button
                    type="submit"
                    :disabled="form.processing"
                    class="flex w-full items-center justify-center rounded-md bg-indigo-600 py-2 font-medium text-white transition hover:bg-indigo-700 disabled:cursor-not-allowed disabled:opacity-70"
                >
                    <span v-if="!form.processing">Login</span>
                    <span v-else>Logging in...</span>
                </button>
            </form>
        </div>
    </div> -->
</template>
