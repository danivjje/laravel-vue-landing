<script setup>
const { buttonType } = defineProps({ buttonType: String });
</script>

<template>
    <button
        class="text-lg px-6 py-2.5 rounded-md hover:opacity-[.88] transition-opacity duration-150 ease-in-out font-medium"
        :class="buttonType === 'gray' ? 'text-[#CEE7FF] gray-gradient' : 'text-[#08090B] blue-gradient'"
    >
        <slot></slot>
    </button>
</template>

<style scoped>
.blue-gradient {
    background: radial-gradient(100.04% 100% at 50% 0%, #66CBF9 0%, #0FB5FF 100%);
}

.gray-gradient {
    background: radial-gradient(100.04% 100% at 50% 0%, #26314E 0%, #1E253C 100%);
}
</style>
