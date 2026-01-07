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
import {
    Mail,
    Lock,
    Info,
    InfoIcon,
    BadgeInfo,
    BadgeInfoIcon,
    LucideInfo
} from "lucide-vue-next"

// =================================================

import { useForm } from '@inertiajs/vue3';
import LoginController from '@/actions/App/Http/Controllers/Auth/LoginController';
// import ItemDescription from "@/components/ui/item/ItemDescription.vue"


let form = useForm({
    email: '',
    password: '',
});

const submit = () => {
    form.submit(LoginController.login())
}
</script>

<template>
    <Head title="Login"></Head>
    <div class="min-h-screen lg:grid lg:grid-cols-2 absolute inset-0 z-0">
        <div class="h-screen relative bg-[url('/public/assets/images/guest_bg.png')] bg-cover bg-center">
        </div>
        <div class="hidden lg:block flex items-center justify-center bg-white">
        </div>
    </div>
    <div class="min-h-screen min-w-screen absolute inset-0 z-10 flex justify-center items-center lg:justify-end">
        <div class="lg:w-1/2 flex justify-center">
            <Card class="h-fit mx-auto absolute w-fit z-20 shadow">
                <img src="../../../public/assets/images/logo_cropped.jpeg" alt="PITX LOGO" class="w-20 px-3 py-1">
            </Card>
            <Card class="w-[380px] pt-15 mt-10 shadow-xl">
                <CardHeader class="text-center">
                    <h6 class="font-bold">Login</h6>
                    <p class="text-muted-foreground">Welcome back!</p>
                </CardHeader>

                <CardContent class="space-y-4">
                    <div>
                        <div class="relative">
                            <Mail class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" />
                            <Input
                                placeholder="Email"
                                v-model="form.email"
                                type="email"
                                class="pl-10"
                                required
                            />
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
                            <Lock class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground"/>
                            <Input
                                placeholder="Password"
                                v-model="form.password"
                                type="password"
                                class="pl-10"
                                required
                            />
                        </div>

                        <Item v-if="form.errors.password" variant="error" size="sm" asChild class="mt-4">
                            <ItemMedia class="items-center">
                                <div class="flex gap-3">
                                    <Info class="size-4 shrink-0 h-4 w-4"></Info>
                                    {{ form.errors.password }}
                                </div>
                            </ItemMedia>
                        </Item>

                        <a
                            href="#"
                            className="block mt-1 text-xs underline-offset-2 hover:underline text-end font-semibold"
                        >
                            Forgot your password?
                        </a>

                    </div>

                    <Button class="w-full mt-2" @click="submit">
                        Login
                    </Button>

                </CardContent>

            </Card>
        </div>
    </div>
</template>
