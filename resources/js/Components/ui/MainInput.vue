<script setup>
defineEmits(["update:modelValue"]);

const { type, placeholder } = defineProps({
    type: String,
    placeholder: String,
    inputClasses: Array,
    modelValue: String,
});
</script>

<template>
    <div class="relative">
        <slot></slot>
        <input
            @input="$emit('update:modelValue', $event.target.value)"
            class="w-full py-2.5 pl-9 pr-[25px] focus:outline-none rounded-md text-lg text-[#6D799C] input font-medium border-solid border-[#3D4865] border-t-[1px] focus:outline-2 focus:outline-[#3D4865]"
            :class="inputClasses"
            :type="type"
            :placeholder="placeholder"
            :value="modelValue"
        />
    </div>
</template>

<style scoped>
.input {
    background-image: radial-gradient(100.04% 100% at 50% 0%, #26314e 0%, #252b3d 100%);
}
</style>
