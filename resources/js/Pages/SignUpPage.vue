<script setup>
import { Link, Head, router } from "@inertiajs/vue3";
import { signUpUser } from "@/Api";
import { reactive, ref } from "vue";
import { useAuthStore } from "@/Store/auth.js";
import { useCommonStore } from "@/Store/common.js";

const authStore = useAuthStore();
const commonStore = useCommonStore();

const error = ref("");
const data = reactive({
    password: "",
});

const handleRegisterUser = async (csrf) => {
    error.value = "";
    const email = commonStore.email.trim();
    const password = data.password.trim();

    if (!email || email.length < 5 || !email.includes("@") || !email.includes(".")) {
        return (error.value = "Invalid email");
    }

    if (!password.trim() || password.length < 6 || password.length > 30) {
        return (error.value = "Length of a password must be from six to thirty characters.");
    }

    try {
        const response = await signUpUser({ email, password }, csrf);
        if ("user" in response) {
            router.visit("/");
            authStore.authenticationInformation.isAuthenticated = true;
            authStore.authenticationInformation.user = response.user;
        } else {
            throw Error(response);
        }
    } catch (err) {
        error.value = "user with this email already exists";
    }
};
</script>

<template>
    <div class="flex flex-col items-center py-10 px-5">
        <Head>
            <title>Sign Up</title>
        </Head>
        <h1 class="text-white text-4xl mb-10">Sign Up</h1>
        <form @submit.prevent="handleRegisterUser($page.props.csrfToken)" class="max-w-[450px] flex flex-col items-center mb-2">
            <h3 v-if="error" class="text-red-600 text-2xl mb-4 text-center">
                {{ error }}
            </h3>
            <MainInput v-model="commonStore.email" type="email" placeholder="E-mail" class="mb-4" />
            <MainInput v-model="data.password" type="password" placeholder="Password" class="mb-4" />
            <MainButton button-type="blue">Sign Up</MainButton>
        </form>
        <Link href="/sign-in" class="text-white text-xl">already registered?</Link>
        <Link href="/" class="text-white text-xl underline">back home</Link>
    </div>
</template>
