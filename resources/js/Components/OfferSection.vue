<script setup>
import CurrenciesList from '@/Components/CurrenciesList.vue';
import RedirectRegisterForm from "@/Components/ui/RedirectRegisterForm.vue";

const { csrfToken } = defineProps({ csrfToken: String });
</script>

<template>
    <section class="overflow-hidden border-solid border-b-[1px] border-[#252C41] bg-no-repeat bg-[position:right_top,_left_top_50px]"
             style="background-image: url('/images/offer-light.svg'), url('/images/offer-bottom-light.svg')">
        <div class="w-full flex items-start px-40 border-solid border-b-[1px] border-[#252C41] max-2xl:px-10 max-xl:flex-col max-xl:items-center max-sm:px-5">
            <div class="flex flex-col max-w-[700px] mt-[88px] max-xl:items-center">
                <p
                    class="uppercase text-[#4ACDFE] font-semibold flex items-center py-2 px-3 rounded-sm border-solid border-t-[1px] border-[#1E2844] logo-gradient
                     w-fit mb-6 max-sm:text-sm"
                >
                    <img src="/images/blue-logotype.svg" alt="" role="presentation" class="mr-2.5 h-4" />
                    decentralized crypto platform
                </p>
                <h1 class="text-[#D5EAFF] text-7xl mb-12 max-xl:text-center max-sm:text-4xl">Buy, trade and store cryptocurrencies</h1>
                <RedirectRegisterForm class="translate-y-1/2" />
            </div>
            <img src="/images/diagram-with-squarts.png" alt="image" class="translate-x-[160px] translate-y-[-1px] w-full max-xl:translate-x-0 max-xl:mt-20
                max-xl:translate-y-[1px] max-sm:hidden">
        </div>
        <CurrenciesList :csrfToken="csrfToken" class="bg-[#0B0F15] px-40 pb-[88px]" />
    </section>
</template>

<style scoped>
.logo-gradient {
    background: radial-gradient(107.69% 100% at 50% 0%, #131a2e 0%, #111624 100%);
}
</style>
