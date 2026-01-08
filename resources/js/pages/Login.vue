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
    LucideInfo,
    Eye,
    EyeOff
} from "lucide-vue-next"
import { ref } from 'vue'

// =================================================

import LoginController from '@/actions/App/Http/Controllers/Auth/LoginController';

let form = useForm({
    email: '',
    password: '',
});

const showPassword = ref(false)
const togglePasswordVisibility = () => {
    showPassword.value = !showPassword.value
}

const submit = () => {
    form.submit(LoginController.login());
};
</script>

<template>
    <!-- Background Layout -->
    <div class="min-h-screen lg:grid lg:grid-cols-2 absolute inset-0 z-0">
        <div class="h-screen relative bg-[url('/public/assets/images/guest_bg.png')] bg-cover bg-center">
            <!-- Gradient overlay for better text contrast -->
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-blue-900/20"></div>
        </div>
        <div class="hidden lg:flex items-center justify-center bg-gradient-to-br from-white to-blue-50">
            <!-- Optional decorative element -->
            <div class="w-64 h-64 rounded-full bg-gradient-to-r from-blue-100 to-indigo-100 opacity-50 blur-3xl"></div>
        </div>
    </div>

    <!-- Login Form -->
    <div class="min-h-screen min-w-screen absolute inset-0 z-10 flex justify-center items-center lg:justify-end">
        <div class="lg:w-1/2 flex justify-center px-4">
            
            <!-- Main Login Card -->
            <Card class="w-full max-w-[420px] pt-20 mt-16 shadow-2xl border border-gray-100 rounded-2xl bg-white/95 backdrop-blur-sm">
                <CardHeader class="text-center space-y-2 pb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Welcome Back</h1>
                    <p class="text-gray-600 text-sm">Sign in to your account to continue</p>
                </CardHeader>

                <CardContent class="space-y-6 px-8 pb-8">
                    <!-- Email Input -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700 block">Email Address</label>
                        <div class="relative group">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-blue-500 transition-colors">
                                <Mail class="h-5 w-5" />
                            </div>
                            <Input
                                placeholder="Enter your email"
                                v-model="form.email"
                                type="email"
                                class="pl-12 h-12 rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all"
                                :class="{'border-red-500 focus:border-red-500 focus:ring-red-500/20': form.errors.email}"
                                required
                            />
                        </div>
                        <p v-if="form.errors.email" class="text-red-600 text-sm mt-1 flex items-center gap-1.5">
                            <Info class="h-4 w-4" />
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

                    <!-- Password Input -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <label class="text-sm font-medium text-gray-700 block">Password</label>
                            <a
                                href="#"
                                class="text-xs text-blue-600 hover:text-blue-800 underline-offset-2 hover:underline font-medium transition-colors"
                            >
                                Forgot password?
                            </a>
                        </div>
                        <div class="relative group">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-blue-500 transition-colors">
                                <Lock class="h-5 w-5" />
                            </div>
                            <Input
                                :placeholder="showPassword ? 'Enter your password' : '••••••••'"
                                v-model="form.password"
                                :type="showPassword ? 'text' : 'password'"
                                class="pl-12 pr-12 h-12 rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all"
                                :class="{'border-red-500 focus:border-red-500 focus:ring-red-500/20': form.errors.password}"
                                required
                            />
                            <button
                                type="button"
                                @click="togglePasswordVisibility"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                            >
                                <Eye v-if="!showPassword" class="h-5 w-5" />
                                <EyeOff v-else class="h-5 w-5" />
                            </button>
                        </div>
                        
                        <!-- Password Error Display -->
                        <div v-if="form.errors.password" class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                            <Item variant="error" size="sm" class="border-0 bg-transparent">
                                <ItemMedia class="items-start">
                                    <div class="flex gap-3">
                                        <Info class="size-4 shrink-0 h-4 w-4 text-red-600 mt-0.5" />
                                        <span class="text-red-700 text-sm">{{ form.errors.password }}</span>
                                    </div>
                                </ItemMedia>
                            </Item>
                        </div>

                        
                        <!-- <div class="flex items-center space-x-2 pt-2">
                            <Checkbox id="remember" class="border-gray-300" />
                            <label for="remember" class="text-sm text-gray-600 cursor-pointer">
                                Remember me for 30 days
                            </label>
                        </div> -->
                    </div>

                    <!-- Login Button -->
                    <Button 
                        @click="submit"
                        :disabled="form.processing"
                        class="w-full h-12 mt-6 rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold shadow-lg hover:shadow-xl transition-all duration-300 disabled:opacity-70 disabled:cursor-not-allowed"
                    >
                        <span v-if="!form.processing" class="flex items-center justify-center gap-2">
                            <Lock class="h-4 w-4" />
                            Sign In
                        </span>
                        <span v-else class="flex items-center justify-center gap-2">
                            <div class="h-4 w-4 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
                            Signing In...
                        </span>
                    </Button>

                    <!-- Divider -->
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm ">
                            <span class="px-4 bg-white text-gray-500 rounded-full">Don't have an account?</span>
                        </div>
                    </div>

                    <!-- Sign Up Link -->
                    <div class="text-center">
                        <a 
                            href="#" 
                            class="inline-flex items-center justify-center w-full h-11 border-2 border-gray-300 rounded-lg text-gray-700 font-medium hover:border-gray-400 hover:bg-gray-50 transition-colors"
                        >
                            Contact Administrator
                        </a>
                    </div>

                    <!-- Help Text -->
                    <p class="text-center text-xs text-gray-500 pt-4">
                        Having trouble signing in? 
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium underline-offset-2 hover:underline ml-1">
                            Get help
                        </a>
                    </p>
                </CardContent>
            </Card>
        </div>
    </div>


</template>

<style scoped>

input:focus {
    outline: none;
}


.focus\:ring-2:focus {
    box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.1);
}


.bg-gradient-to-r {
    background-size: 200% 200%;
    animation: gradientShift 3s ease infinite;
}

@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}
</style>