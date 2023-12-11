<script setup>
import { useAuthStore } from "@/Store/auth.js";

import { Link } from "@inertiajs/vue3";
import AuthorizationList from "@/Components/ui/AuthorizationList.vue";

const emit = defineEmits(['close']);
const { navItems } = defineProps({ navItems: Array });

const authStore = useAuthStore();
</script>

<template>
    <div class="fixed inset-0 z-20 bg-[#08090B] flex flex-col items-center justify-center py-5 px-5">
        <button @click="emit('close')" class="h-11 w-11 absolute right-2.5 top-2.5">
            <img src="/images/close-icon.svg" role="presentation" alt="">
        </button>
        <MainInput type="search" placeholder="Search" class="mb-5">
            <img src="/images/search-icon.svg" role="presentation" alt="" class="absolute top-1/2 left-2 translate-y-[-50%]" />
        </MainInput>
        <nav class="mb-5">
            <ul class="flex flex-col items-center">
                <li
                    v-for="(item, index) in navItems"
                    :key="index"
                    class="text-[#464E62] mb-4 last:mb-0 text-lg hover:text-[#616B85] transition-colors duration-150"
                >
                    <Link href="/">{{ item }}</Link>
                </li>
            </ul>
        </nav>
        <Link href="/admin-panel" class="mb-2">
            <MainButton v-if="authStore.authenticationInformation.user?.is_admin" buttonType="blue">
                Admin Panel
            </MainButton>
        </Link>
        <AuthorizationList v-if="!authStore.authenticationInformation.isAuthenticated" />
        <MainButton v-else @click="authStore.logOutUser($page.props.csrfToken)" button-type="blue">Log out</MainButton>
    </div>
</template>
