<script setup>
import { getCoins } from "@/Api";

const socket = new WebSocket('wss://ws-api.binance.com:443/ws-api/v3');

let intervalID;
const REQUEST_ID = "31438953894589345";

//     "symbol": "BTCUSDT",
//     "priceChange": "1037.51000000",
//     "priceChangePercent": "2.394",
//     "weightedAvgPrice": "43645.20859738",
//     "prevClosePrice": "43336.84000000",
//     "lastPrice": "44374.35000000",
//     "lastQty": "0.00541000",
//     "bidPrice": "44373.10000000",
//     "bidQty": "2.05970000",
//     "askPrice": "44374.52000000",
//     "askQty": "0.00216000",
//     "openPrice": "43336.84000000",
//     "highPrice": "44700.00000000",
//     "lowPrice": "43081.10000000",
//     "volume": "42089.87314000",
//     "quoteVolume": "1837021293.03258710",

socket.addEventListener('open', (event) => {
    console.log('connection is opened', event);
    intervalID = setInterval(() => {
        socket.send(JSON.stringify({
            "id": REQUEST_ID,
            "method": "ticker.24hr",
            "params": {
                symbols: ['BTCUSDT'],
            }
        }));
    }, 5000);
});

socket.addEventListener('message', (event) => {
    const data = event.data?.result ?? JSON.parse(event.data).result;
    console.log('message received', data);
});

socket.addEventListener('close', (event) => {
    console.log('connection is closed');
    if (intervalID) {
        clearInterval(intervalID);
    }
})
</script>

<template>

</template>
