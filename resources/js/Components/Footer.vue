<script setup>
import { useAuthStore } from "@/Store/auth.js";

import { Link } from "@inertiajs/vue3";
import AuthorizationList from "@/Components/ui/AuthorizationList.vue";

const authStore = useAuthStore();

const { navItems } = defineProps({ navItems: Array });

const socialLinks = [
    { icon: "/images/telegram-icon.svg", link: "https://web.telegram.org" },
    { icon: "/images/facebook-icon.svg", link: "https://www.facebook.com" },
    { icon: "/images/twitter-icon.svg", link: "https://twitter.com/" },
];
</script>

<template>
    <footer class="pt-16 px-40 pb-8 flex flex-col items-center max-[1580px]:px-10 max-sm:px-5">
        <div class="flex w-full mb-16 max-sm:flex-col max-sm:items-center">
            <div class="mr-auto max-sm:mr-0 max-sm:mb-10 max-sm:flex max-sm:flex-col max-sm:items-center">
                <Link class="block" href="/">
                    <img
                        class="mb-12 hover:drop-shadow-[0_0_6px_rgba(255,255,255,0.25)] transition-[filter] duration-150"
                        src="/images/footer-logotype.svg"
                        alt="logo"
                    />
                </Link>
                <ul class="flex mb-[68px] max-sm:justify-center">
                    <li
                        v-for="(item, index) in socialLinks"
                        :key="index"
                        class="mr-4 last:mr-0 hover:opacity-90 transition-opacity duration-150"
                    >
                        <a :href="item.link">
                            <img :src="item.icon" alt="social link" />
                        </a>
                    </li>
                </ul>
                <AuthorizationList v-if="!authStore.authenticationInformation.isAuthenticated" />
                <MainButton @click="authStore.logOutUser($page.props.csrfToken)" v-else>Log out</MainButton>
            </div>
            <ul class="flex">
                <li class="mr-14">
                    <ul class="flex flex-col">
                        <li
                            v-for="(item, index) in navItems"
                            :key="index"
                            class="text-[#464E62] hover:text-[#657190] text-lg mb-7 last:mb-0 transition-colors duration-150"
                        >
                            <Link href="/">{{ item }}</Link>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul class="flex flex-col">
                        <li
                            v-for="(item, index) in ['Privacy policy', 'Terms of rules']"
                            :key="index"
                            class="text-[#464E62] hover:text-[#657190] text-lg mb-7 last:mb-0 transition-colors duration-150 cursor-pointer"
                        >
                            {{ item }}
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <p class="text-[#27314A] text-lg font-medium">Bitlist© All Rights Reserved</p>
    </footer>
</template>
