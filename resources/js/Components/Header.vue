<script setup>
import { Link } from "@inertiajs/vue3";
import { useAuthStore } from "@/store/auth.js";

import AuthorizationList from "@/components/ui/AuthorizationList.vue";

const { navItems } = defineProps({ navItems: Array });

const authStore = useAuthStore();
</script>

<template>
    <header class="w-full flex items-center py-7 px-40">
        <Link href="/">
            <img
                class="hover:drop-shadow-[0_0_6px_rgba(255,255,255,0.48)] transition-[filter] duration-200"
                src="/images/header-logotype.svg"
                alt="logo of the website"
            />
        </Link>
        <span class="block w-px h-6 bg-[#252C41] rounded-full mx-9"></span>
        <MainInput type="search" placeholder="Search" class="mr-auto">
            <img src="/images/search-icon.svg" role="presentation" alt="" class="absolute top-1/2 left-2 translate-y-[-50%]" />
        </MainInput>
        <nav>
            <ul class="flex">
                <li
                    v-for="(item, index) in navItems"
                    :key="index"
                    class="text-[#464E62] mr-8 last:mr-0 text-lg hover:text-[#616B85] transition-colors duration-150"
                >
                    <Link href="/">{{ item }}</Link>
                </li>
            </ul>
        </nav>
        <span class="block w-px h-6 bg-[#252C41] rounded-full mx-9"></span>
            <Link href="/admin-panel">
                <MainButton v-if="authStore.authenticationInformation.user?.is_admin" buttonType="blue" class="mr-4">
                    Admin Panel
                </MainButton>
            </Link>
        <AuthorizationList v-if="!authStore.authenticationInformation.isAuthenticated" />
        <MainButton v-else @click="authStore.logOutUser($page.props.csrfToken)" button-type="blue">Log out</MainButton>
    </header>
</template>

<style scoped>
.line {
    background: linear-gradient(90deg, rgba(64, 193, 251, 0) 8.36%, #40c1fb 50.39%, rgba(64, 193, 251, 0) 91.67%), #252c41;
}
</style>
