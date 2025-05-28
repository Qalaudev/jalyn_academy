<!-- views/admin/Courses.vue -->
<template>
    <AdminLayout>
        <div class="relative max-h-[400px] overflow-x-auto overflow-y-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Role ID</th>
                    </tr>
                </thead>
                <tbody>
                <tr v-for="user in users" :key="user.id"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <td class="px-6 py-4">{{ user.id }}</td>
                    <td class="px-6 py-4">
                        <router-link :to="`/admin-page/users/${user.id}`" class="text-blue-600 hover:underline">
                            {{ user.name }}
                        </router-link>
                    </td>
                    <td class="px-6 py-4">{{ user.email }}</td>
                    <td class="px-6 py-4">{{ user.role_id }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </AdminLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import AdminLayout from '../../layout/AdminLayout.vue';

const users = ref([]);

const usersList = async () => {
    try {
        const response = await fetch('http://127.0.0.1:8000/admin', {
            headers: {
                Accept: 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content,
            },
            credentials: 'include',
        });

        if (response.ok) {
            users.value = await response.json();
        } else {
            console.error('Қолданушы тізімін алу сәтсіз аяқталды.');
        }
    } catch (error) {
        console.error('Сервер қатесі:', error);
    }
};

onMounted(usersList);
</script>

