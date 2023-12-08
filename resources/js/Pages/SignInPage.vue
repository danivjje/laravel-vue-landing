<script setup>
import { signInUser } from "@/api";
import { Link, Head, router } from "@inertiajs/vue3";
import { reactive, ref } from "vue";
import { useAuthStore } from "@/Store/auth.js";

const authStore = useAuthStore();

const error = ref("");
const data = reactive({
    email: "",
    password: "",
});

const handleLoginUser = async (csrf) => {
    const email = data.email.trim();
    const password = data.password.trim();

    if (!email || email.length < 5 || !email.includes("@") || !email.includes(".")) return (error.value = "Invalid email");
    if (!password || password.length < 6 || password.length > 30) return (error.value = "Invalid password");

    try {
        const response = await signInUser({ email, password }, csrf);
        if ("user" in response) {
            router.visit('/');
            authStore.authenticationInformation.isAuthenticated = true;
            authStore.authenticationInformation.user = response.user;
        }
    } catch (err) {
        console.log(err);
        error.value = "Unknown error, try again or reload the page";
    }
};
</script>

<template>
    <div class="flex flex-col items-center py-10 px-5">
        <Head>
            <title>Sign In</title>
        </Head>
        <h1 class="text-white text-4xl mb-10">Sign In</h1>
        <form @submit.prevent="handleLoginUser($page.props.csrfToken)" class="max-w-[450px] flex flex-col items-center mb-2">
            <h3 v-if="error" class="text-red-600 text-2xl mb-4 text-center">
                {{ error }}
            </h3>

            <MainInput v-model="data.email" type="email" placeholder="E-mail" class="mb-4" />
            <MainInput v-model="data.password" type="password" placeholder="Password" class="mb-4" />
            <MainButton button-type="blue">Sign In</MainButton>
        </form>
        <Link href="/sign-up" class="text-white text-xl">not registered?</Link>
        <Link href="/" class="text-white text-xl">back home</Link>
    </div>
</template>
