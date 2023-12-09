<script setup>
import { getCoins } from "@/Api";
import { coinNames } from "@/Assets/coinNames";
import { onMounted, ref, onUnmounted } from "vue";

const { csrfToken } = defineProps({ csrfToken: String });

let intervalID;
const REQUEST_ID = "31438953894589345";
const socket = new WebSocket("wss://ws-api.binance.com:443/ws-api/v3");

const selectedSymbols = ref([]);
const fetchedData = ref([]);

const fetchCoins = async () => {
    try {
        const response = await getCoins(csrfToken);
        if ("data" in response && "coins" in response.data) {
            selectedSymbols.value = response.data.coins.slice(0, 6);
        }
    } catch (err) {
        console.log(err);
    }
};

const getAllCoins = async () => {
    try {
        const response = await getCoins(csrfToken);
        if ("data" in response && "coins" in response.data) {
            selectedSymbols.value = response.data.coins;
        }
    } catch (err) {
        console.log(err);
    }
};

const formatVolumeNumber = (num) => {
    const number = String(Number(num).toFixed(0));
    let letter = "";
    if (number.length >= 4) letter = "K";
    if (number.length >= 7) letter = "M";
    if (number.length >= 10) letter = "B";
    if (number.length >= 13) letter = "T";
    if (number.length >= 16) letter = "Q";

    return {
        number: new Intl.NumberFormat("de-DE").format(Number(number)),
        letter,
    };
};

socket.addEventListener("open", (event) => {
    intervalID = setInterval(() => {
        if (selectedSymbols.value.length) {
            socket.send(
                JSON.stringify({
                    id: REQUEST_ID,
                    method: "ticker.24hr",
                    params: {
                        symbols: selectedSymbols.value,
                    },
                })
            );
        }
    }, 3000);
});

socket.addEventListener("message", (event) => {
    const data = event.data?.result ?? JSON.parse(event.data).result;
    if (data) {
        if (!event?.data?.id) {
            if (JSON.parse(event.data).id !== REQUEST_ID) return;
        } else {
            if (event.data.id !== REQUEST_ID) return;
        }

        fetchedData.value = data;
    }
});

socket.addEventListener("close", (event) => {
    console.log("connection is closed");
    if (intervalID) {
        clearInterval(intervalID);
    }
});

onMounted(() => {
    if (!selectedSymbols.value.length) {
        fetchCoins();
    }
});

onUnmounted(() => {
    socket.close();
});
</script>

<template>
    <div class="pt-[100px]">
        <div class="border-solid border-[1px] border-[#222D3E] rounded-2xl mb-4">
            <table class="w-full background-gradient rounded-2xl">
                <tr>
                    <th class="text-[#6D799C] font-medium text-base py-5 text-left pl-6">Asset</th>
                    <th class="text-[#6D799C] font-medium text-base py-5">Price</th>
                    <th class="text-[#6D799C] font-medium text-base py-5">Change</th>
                    <th class="text-[#6D799C] font-medium text-base py-5">Volume</th>
                    <th class="hidden"></th>
                </tr>
                <tr v-for="symbol in fetchedData" class="border-t-[1px] border-solid border-[#222D3E]">
                    <td class="flex items-center pl-6 py-5">
                        <img src="/images/bitcoin-icon.svg" alt="" role="presentation" class="mr-5" />
                        <span class="text-xl text-[#C7E1FF] mr-2">{{ coinNames[symbol.symbol] }}</span>
                        <span class="text-base text-[#525A71] translate-y-[1px]">{{
                            symbol.symbol.substr(0, symbol.symbol.length - 4)
                        }}</span>
                    </td>
                    <td class="text-center text-[#C7E1FF] text-xl py-5">
                        <span class="text-base">$</span> {{ new Intl.NumberFormat("de-DE").format(symbol.lastPrice) }}
                    </td>
                    <td
                        class="text-center text-xl text-[#58F0A7] py-5"
                        :class="{ 'text-[#F94B55]': Number(symbol.priceChangePercent) < 0 }"
                    >
                        {{ Math.abs(Number(symbol.priceChangePercent)).toFixed(2) }}
                        <span class="text-base">%</span>
                    </td>
                    <td class="text-center text-[#C7E1FF] text-xl py-5">
                        <span>{{ formatVolumeNumber(symbol.quoteVolume).number }}</span>
                        <span class="text-base">{{ formatVolumeNumber(symbol.quoteVolume).letter }}</span>
                    </td>
                    <td class="pr-5 text-right py-5">
                        <button
                            class="text-[#2FBDFC] text-lg font-medium py-1.5 px-4 rounded-md border-[1px] border-solid border-[#2FBDFC] transition-colors hover:text-[#10161F] hover:bg-[#2FBDFC]"
                        >
                            Trade
                        </button>
                    </td>
                </tr>
            </table>
        </div>
        <MainButton @click="getAllCoins" buttonType="gray" class="w-full">All assets</MainButton>
    </div>
</template>

<style scoped>
.background-gradient {
    background: radial-gradient(100.04% 100% at 50% 0%, #26314e 0%, #131820 0.01%, #0f151e 100%);
}
</style>
