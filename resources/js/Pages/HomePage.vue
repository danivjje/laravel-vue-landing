<script setup>
import { onMounted } from 'vue';

import { Head } from "@inertiajs/vue3";
import Header from "@/components/Header.vue";
import OfferSection from "@/components/OfferSection.vue";
import CurrenciesSection from "@/components/CurrenciesSection.vue";
import AboutSection from "@/components/AboutSection.vue";
import BenefitsSection from "@/components/BenefitsSection.vue";
import RegisterNowSection from "@/components/RegisterNowSection.vue";
import Footer from "@/components/Footer.vue";
import {useAuthStore} from "@/Store/auth.js";

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
        <OfferSection />
        <CurrenciesSection />
        <AboutSection />
        <BenefitsSection />
        <RegisterNowSection />
        <Footer :navItems="navItems" />
    </div>
</template>
