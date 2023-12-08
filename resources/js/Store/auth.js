import { router } from '@inertiajs/vue3';
import { reactive } from "vue";
import { defineStore } from "pinia";
import { checkSession, logOut } from "@/api";

export const useAuthStore = defineStore('store', () => {
    const authenticationInformation = reactive({
        isAuthenticated: false,
        user: {},
    });

    const checkAuthentication = async (csrf) => {
        try {
            const response = await checkSession(csrf);
            if (response.is_authenticated) {
                authenticationInformation.isAuthenticated = response.is_authenticated;
                authenticationInformation.user = JSON.parse(JSON.stringify(response.user));
            }
        } catch (err) {
            console.log(err)
        }
    }

    const logOutUser = async (csrf) => {
        try {
            await logOut(csrf);
            router.visit('/sign-in');

            authenticationInformation.isAuthenticated = false;
            authenticationInformation.user = {};
        } catch (err) {
            console.log(err)
        }
    }

    return {
        authenticationInformation,
        checkAuthentication,
        logOutUser
    };
});
