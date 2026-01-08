<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader } from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Item, ItemMedia } from '@/components/ui/item';
// import { Checkbox } from "@/components/ui/checkbox"
import { Info, Lock, Mail } from 'lucide-vue-next';

// =================================================

import LoginController from '@/actions/App/Http/Controllers/Auth/LoginController';
import { useForm } from '@inertiajs/vue3';
// import ItemDescription from "@/components/ui/item/ItemDescription.vue"

let form = useForm({
    email: '',
    password: '',
});

const submit = () => {
    form.submit(LoginController.login());
};
</script>

<template>
    <div class="absolute inset-0 z-0 min-h-screen lg:grid lg:grid-cols-2">
        <div class="relative h-screen bg-[url('/public/assets/images/guest_bg.png')] bg-cover bg-center"></div>
        <div class="flex hidden items-center justify-center bg-white lg:block"></div>
    </div>
    <div class="absolute inset-0 z-10 flex min-h-screen min-w-screen items-center justify-center lg:justify-end">
        <div class="flex justify-center lg:w-1/2">
            <Card class="absolute z-20 mx-auto h-fit w-fit shadow">
                <img src="../../../public/assets/images/logo_cropped.jpeg" alt="PITX LOGO" class="w-20 px-3 py-1" />
            </Card>
            <Card class="mt-10 w-[380px] pt-15 shadow-xl">
                <CardHeader class="text-center">
                    <h6 class="font-bold">Login</h6>
                    <p class="text-muted-foreground">Welcome back!</p>
                </CardHeader>

                <CardContent class="space-y-4">
                    <div>
                        <div class="relative">
                            <Mail class="absolute top-1/2 left-3 h-4 w-4 -translate-y-1/2 text-muted-foreground" />
                            <Input placeholder="Email" v-model="form.email" type="email" class="pl-10" required />
                        </div>

                        <p vi-if="form.errors.email" class="mt-1 w-full">
                            {{ form.errors.email }}
                        </p>
                    </div>

                    <div>
                        <div class="relative">
                            <Lock class="absolute top-1/2 left-3 h-4 w-4 -translate-y-1/2 text-muted-foreground" />
                            <Input placeholder="Password" v-model="form.password" type="password" class="pl-10" required />
                        </div>

                        <Item v-if="form.errors.password" variant="error" size="sm" asChild class="mt-4">
                            <ItemMedia class="items-center">
                                <div class="flex gap-3">
                                    <Info class="size-4 h-4 w-4 shrink-0"></Info>
                                    {{ form.errors.password }}
                                </div>
                            </ItemMedia>
                        </Item>

                        <a href="#" className="block mt-1 text-xs underline-offset-2 hover:underline text-end font-semibold">
                            Forgot your password?
                        </a>
                    </div>

                    <Button class="mt-2 w-full" @click="submit"> Login </Button>
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
