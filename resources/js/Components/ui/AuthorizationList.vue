<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <ul class="flex">
        <li class="mr-2">
            <Link href="/sign-up">
                <MainButton button-type="gray">Register</MainButton>
            </Link>
        </li>
        <li>
            <Link href="/sign-in">
                <MainButton button-type="blue">Log in</MainButton>
            </Link>
        </li>
    </ul>
</template>
