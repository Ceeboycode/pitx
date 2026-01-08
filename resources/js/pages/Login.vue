<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import { Button } from "@/components/ui/button"
import { Input } from "@/components/ui/input"
import {
    Form,
    FormMessage,
    FormItem,
    FormLabel,
    FormDescription,
    FormControl,
    FormField,
    FormFieldArray
} from "@/components/ui/form"
import {
    Card,
    CardContent,
    CardHeader,
    CardTitle
} from "@/components/ui/card"
import {
    Item,
    ItemActions,
    ItemContent,
    ItemDescription,
    ItemFooter,
    ItemGroup,
    ItemHeader,
    ItemMedia,
    ItemMediaVariants,
    ItemSeparator,
    ItemTitle,
    ItemVariants
} from "@/components/ui/item"
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
    <Head title="Login"></Head>
    <div class="min-h-screen lg:grid lg:grid-cols-2 absolute inset-0 z-0">
        <div class="h-screen relative bg-[url('/public/assets/images/guest_bg.png')] bg-cover bg-center">
        </div>
        <div class="hidden lg:block flex items-center justify-center bg-white">
        </div>
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
<!--
                        <p vi-if="form.errors.email" class="mt-1 w-full">
                            {{ form.errors.email }}
                        </p> -->

                        <Item v-if="form.errors.email" variant="error" size="sm" asChild class="mt-4">
                            <ItemMedia class="items-center">
                                <div class="flex gap-3">
                                    <Info class="size-4 shrink-0 h-4 w-4"></Info>
                                    {{ form.errors.email }}
                                </div>
                            </ItemMedia>
                        </Item>

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
</template>
