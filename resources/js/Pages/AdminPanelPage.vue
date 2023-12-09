<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { shallowRef } from 'vue';

import CoinsTab from '@/Components/AdminPanel/CoinsTab.vue';
import UsersTab from '@/Components/AdminPanel/UsersTab.vue';

const { csrfToken } = defineProps({ csrfToken: String });

const currentTab = shallowRef(CoinsTab);
</script>

<template>
    <div class="py-5 px-10 flex flex-col items-center">
        <Head>
            <title>Admin Panel</title>
        </Head>
        <ul class="flex mb-10">
            <li @click="currentTab = UsersTab" class="mr-4 text-white text-4xl">Users</li>
            <li @click="currentTab = CoinsTab" class="mr-4 text-white text-4xl">Coins</li>
            <li class="text-white text-4xl">
                <Link href="/">Home</Link>
            </li>
        </ul>
        <component :is="currentTab" :csrfToken="csrfToken" />
    </div>
</template>
