<script setup></script>

<template>
    <form @submit.prevent class="mb-11 flex flex-col max-w-[420px] w-full">
        <div class="w-full flex justify-center mb-[88px] relative">
            <MainInput type="email" placeholder="Example@gmail.com" class="w-full" :input-classes="['pr-32']">
                <img src="/images/mail-icon.svg" role="presentation" alt="" class="absolute top-1/2 left-2 translate-y-[-50%] z-[3]" />
            </MainInput>
            <MainButton button-type="blue" class="absolute top-0 right-0">Sign in</MainButton>
        </div>
        <slot></slot>
    </form>
</template>
