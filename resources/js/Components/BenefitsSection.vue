<script setup>
const benefits = [
    {
        icon: '/images/card-icon.svg',
        title: 'User Safe Asset Fund (SAFU) world.',
        description: 'Bitlist holds 10% of all trading fees in a protected asset fund to protect a portion of user funds.'
    },
    {
        icon: '/images/eye-icon.svg',
        title: 'User Access Control',
        description: 'Personalized access control allows you to limit the devices and addresses that can access your account.'
    },
    {
        icon: '/images/lock-icon.svg',
        title: 'Improved data encryption',
        description: 'Your transaction data is encrypted - only you can access your personal data.',
    },
    {
        icon: '/images/message-icon.svg',
        title: 'Support 24/7',
        description: '24/7 real-time support is always ready to help you.',
    },
    {
        icon: '/images/rocket-icon.svg',
        title: 'Fast replineshments and withdraws',
        description: 'Transfer funds to and from your accounts quickly and easily.',
    },
    {
        icon: '/images/coins-icon.svg',
        title: 'Comfortable P2P platform',
        description: 'Top up your account in any convenient way on the P2P platform at favorable rates.',
    },
];
</script>

<template>
    <section class="px-[400px]">
        <ul class="flex flex-wrap justify-between">
            <li v-for="(item, index) in benefits" :key="index" class="flex flex-col max-w-[307px] w-full mb-20">
                <span class="block rounded border-solid border-[#52C5FA] border-[1px] w-fit py-2.5 px-4 bg-gradient-to-b from-[#242834] from-0% to-[#1A1D26] to-100% mb-6">
                    <img :src="item.icon" alt="" role="presentation">
                </span>
                <h4 class="text-[#D5EAFF] text-xl mb-2">{{ item.title }}</h4>
                <p class="text-[#464E62] text-lg">{{ item.description }}</p>
            </li>
        </ul>
    </section>
</template>
