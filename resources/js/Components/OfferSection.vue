<script setup>
import RedirectRegisterForm from "@/components/ui/RedirectRegisterForm.vue";
</script>

<template>
    <section class="px-40 pt-[88px] flex items-start">
        <div class="flex flex-col max-w-[700px]">
            <p
                class="uppercase text-[#4ACDFE] font-semibold flex items-center py-2 px-3 rounded-sm border-solid border-t-[1px] border-[#1E2844] logo-gradient w-fit mb-6"
            >
                <img src="/images/blue-logotype.svg" alt="" role="presentation" class="mr-2.5 h-4" />
                decentralized crypto platform
            </p>
            <h1 class="text-[#D5EAFF] text-7xl mb-12">Buy, trade and store cryptocurrencies</h1>
            <RedirectRegisterForm />
        </div>
        <img src="/images/diagram-with-squarts.png" alt="image" class="translate-x-[220px] translate-y-[-88px] w-full">
    </section>
</template>

<style scoped>
.logo-gradient {
    background: radial-gradient(107.69% 100% at 50% 0%, #131a2e 0%, #111624 100%);
}
</style>
