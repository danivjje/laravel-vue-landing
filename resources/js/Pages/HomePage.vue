<script setup>
import { onMounted } from 'vue';

import { Head } from "@inertiajs/vue3";
import Header from "@/components/Header.vue";
import OfferSection from "@/components/OfferSection.vue";
import AboutSection from "@/components/AboutSection.vue";
import BenefitsSection from "@/components/BenefitsSection.vue";
import RegisterNowSection from "@/components/RegisterNowSection.vue";
import Footer from "@/components/Footer.vue";
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
    background: linear-gradient(90deg, rgba(64, 193, 251, 0.00) 8.36%, #40C1FB 50.39%, rgba(64, 193, 251, 0.00) 91.67%), #252C41;
}
</style>
