<script setup>
import { onMounted } from "vue";

import { Head } from "@inertiajs/vue3";
import Header from "@/Components/Header.vue";
import OfferSection from "@/Components/OfferSection.vue";
import AboutSection from "@/Components/AboutSection.vue";
import BenefitsSection from "@/Components/BenefitsSection.vue";
import RegisterNowSection from "@/Components/RegisterNowSection.vue";
import Footer from "@/Components/Footer.vue";
import { useAuthStore } from "@/Store/auth.js";

const { csrfToken } = defineProps({ csrfToken: String });
const authStore = useAuthStore();

const navItems = ["Trade", "P2P", "Partners", "Mining", "Academy"];

onMounted(() => {
    if (!authStore.authenticationInformation.user.email) {
        authStore.checkAuthentication(csrfToken);
    }
});
</script>

<template>
    <div class="w-full bg-[#08090B]">
        <Head>
            <title>Home</title>
        </Head>
        <Header :navItems="navItems" />
        <div class="line h-px w-full"></div>
        <OfferSection :csrfToken="csrfToken" />
        <AboutSection />
        <div class="line h-px w-full"></div>
        <BenefitsSection />
        <div class="line h-px w-full"></div>
        <RegisterNowSection />
        <Footer :navItems="navItems" />
    </div>
</template>

<style scoped>
.line {
    background: linear-gradient(90deg, rgba(64, 193, 251, 0) 8.36%, #40c1fb 50.39%, rgba(64, 193, 251, 0) 91.67%), #252c41;
}
</style>
