<script setup>
import { useCommonStore } from "@/Store/common.js";

import { Link } from "@inertiajs/vue3";

const commonStore = useCommonStore();
</script>

<template>
    <form @submit.prevent class="flex flex-col max-w-[420px] w-full">
        <div class="w-full flex justify-center relative">
            <MainInput v-model="commonStore.email" type="email" placeholder="Example@gmail.com" class="w-full" :input-classes="['pr-32']">
                <img src="/images/mail-icon.svg" role="presentation" alt="" class="absolute top-1/2 left-2 translate-y-[-50%] z-[3]" />
            </MainInput>
                <Link href="/sign-in">
                    <MainButton button-type="blue" class="absolute top-0 right-0">Sign In</MainButton>
                </Link>
        </div>
        <slot></slot>
    </form>
</template>
