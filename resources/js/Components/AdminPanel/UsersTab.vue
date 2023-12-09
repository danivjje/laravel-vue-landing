<script setup>
import { getUsers, deleteUser } from '@/Api';
import {onMounted, ref} from "vue";

const { csrfToken } = defineProps({ csrfToken: String });

const users = ref([]);

const fetchUsers = async () => {
    try {
        const response = await getUsers(csrfToken);
        users.value = response.data;
    } catch (err) {
        console.log(err)
    }
}

const handleDeleteUser = async (csrf, id) => {
    try {
        await deleteUser(csrf, id);
        users.value = users.value.filter((item) => item.id !== id);
    } catch (err) {
        console.log(err)
    }
}

onMounted(() => {
    if (!users.value.length) {
        fetchUsers();
    }
})
</script>

<template>
    <div class="w-full">
        <ul class="flex flex-col items-center">
            <li v-for="user in users" :key="user.id" class="text-white text-lg mb-4 last:mb-0 flex items-center">
                <b>{{ user.id }}</b>:
                <span class="mr-4">{{ user.email }}</span>
                <MainButton @click="handleDeleteUser($page.props.csrfToken, user.id)">delete</MainButton>
            </li>
        </ul>
    </div>
</template>
