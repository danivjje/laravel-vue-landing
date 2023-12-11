<script setup>
import RedirectRegisterForm from "@/components/ui/RedirectRegisterForm.vue";
</script>

<template>
    <section class="px-[610px] pt-[88px] flex flex-col items-center border-solid border-b-[1px] border-[#252C41] pb-11 bg-[position:center_top_-500px]
        max-2xl:px-[300px] max-lg:px-20 max-sm:px-5"
        style="background-image: url('/images/register-now-light.svg')">
        <h2 class="text-5xl text-[#D5EAFF] text-center mb-[54px]">
            Register your account now <br />
            and start to trade
        </h2>
        <RedirectRegisterForm>
            <img src="/images/white-logotype.svg" alt="logo" class="ml-9 mt-[88px] w-fit" />
        </RedirectRegisterForm>
    </section>
</template>
