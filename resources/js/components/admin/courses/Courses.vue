<!-- views/admin/Courses.vue -->
<template>
    <AdminLayout>
        <div class="relative max-h-[400px] overflow-x-auto overflow-y-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Title</th>
                    <th class="px-6 py-3">Level</th>
                    <th class="px-6 py-3">Format</th>
                    <th class="px-6 py-3">Code</th>
                    <th class="px-6 py-3">Price</th>
                    <th class="px-6 py-3">Permission</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="course in courses" :key="course.id"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <td class="px-6 py-4">{{ course.id }}</td>
                    <td class="px-6 py-4">
                        <router-link :to="`/admin-page/courses/${course.id}`" class="text-blue-600 hover:underline">
                            {{ course.title }}
                        </router-link>
                    </td>
                    <td class="px-6 py-4">{{ course.level }}</td>
                    <td class="px-6 py-4">{{ course.format }}</td>
                    <td class="px-6 py-4">{{ course.code }}</td>
                    <td class="px-6 py-4">{{ course.price }}</td>
                    <td class="px-6 py-4">
                        <input type="checkbox" disabled />
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </AdminLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import AdminLayout from '../../layout/AdminLayout.vue';

const courses = ref([]);

const fetchCourses = async () => {
    try {
        const response = await fetch('http://127.0.0.1:8000/admin/courses', {
            headers: {
                Accept: 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content,
            },
            credentials: 'include',
        });

        if (response.ok) {
            courses.value = await response.json();
        } else {
            console.error('Курстарды алу сәтсіз.');
        }
    } catch (error) {
        console.error('Сервер қатесі:', error);
    }
};

onMounted(fetchCourses);
</script>
