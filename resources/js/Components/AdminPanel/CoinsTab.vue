<script setup>
import { coinNames } from '@/Assets/coinNames.js';
import { onMounted, ref } from "vue";
import { getCoins, updateCoins } from "@/Api";

const { csrfToken } = defineProps({ csrfToken: String });

const coins = ref([]);
const selectedCoins = ref([]);

async function fetchCoins() {
    const response = await fetch('https://www.binance.com/api/v3/ticker/24hr', { method: 'get' });
    const data = await response.json();

    coins.value = data.filter((item) => {
        return item.symbol.includes('USDT');
    });
}

async function fetchSelectedCoins() {
    const response = await getCoins(csrfToken);
    if ('data' in response && 'coins' in response.data) {
        selectedCoins.value = response.data.coins;
    }
}

const handleCoinAction = (symbol) => {
    if (selectedCoins.value.includes(symbol)) {
        return selectedCoins.value = selectedCoins.value.filter((item) => item !== symbol);
    }

    selectedCoins.value.push(symbol);
}

const handleUpdateCoins = async () => {
    try {
        await updateCoins(csrfToken, { coins: selectedCoins.value });
    } catch (err) {
        console.log(err)
    }
}

onMounted(() => {
    if (!coins.value.length) {
        fetchCoins();
        fetchSelectedCoins();
    }
})
</script>

<template>
   <div class="w-full flex flex-col items-center">
       <MainButton @click="handleUpdateCoins()" class="mb-10" buttonType="gray">
           SAVE CHANGES
       </MainButton>
       <ul class="list-disc">
           <li v-for="coin in coins" :key="coin.symbol" class="text-white text-2xl mb-3 last:mb-0 flex items-center">
               <span class="mr-3">{{ coin.symbol }} ({{ coinNames[coin.symbol] }})</span>
               <MainButton @click="handleCoinAction(coin.symbol)">
                   {{ selectedCoins.includes(coin.symbol) ? 'remove' : 'add' }}
               </MainButton>
           </li>
       </ul>
   </div>
</template>
