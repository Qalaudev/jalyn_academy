<template>
    <AdminLayout>
        <div class="relative max-h-[400px] mt-[20px] ml-[350px] mr-[100px]">
            <!-- Информация о курсе -->
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Title</th>
                    <th class="px-6 py-3">Level</th>
                    <th class="px-6 py-3">Format</th>
                    <th class="px-6 py-3">Code</th>
                    <th class="px-6 py-3">Price</th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ course.id }}</td>
                    <td class="px-6 py-4">{{ course.title }}</td>
                    <td class="px-6 py-4">{{ course.level }}</td>
                    <td class="px-6 py-4">{{ course.format }}</td>
                    <td class="px-6 py-4">{{ course.code }}</td>
                    <td class="px-6 py-4">{{ course.price }}</td>
                </tr>
                </tbody>
            </table>

            <!-- Форма -->
            <form @submit.prevent="submitProgram" class="mt-6 space-y-4 max-w-xl mx-auto">
                <div>
                    <label class="block text-sm font-medium text-gray-900">Название</label>
                    <input
                        v-model="form.name"
                        type="text"
                        required
                        class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600"
                    />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-900">Описание</label>
                    <textarea
                        v-model="form.description"
                        rows="3"
                        required
                        class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 resize-none"
                    />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-900">Ссылка на видео</label>
                    <textarea
                        v-model="form.video_url"
                        rows="2"
                        class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 resize-none"
                    />
                </div>

                <button
                    type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 transition"
                >
                    Добавить
                </button>
            </form>


            <!-- Программы -->
            <h1 class="text-center text-3xl mt-6 font-bold">Программа обучения</h1>
            <div class="container mx-auto px-4 py-8">
                <div
                    v-for="program in course.training_programs"
                    :key="program.id"
                    class="border border-gray-700 rounded-xl mb-4"
                >
                    <div
                        class="flex justify-between items-center p-6 cursor-pointer"
                        @click="toggle(program.id)"
                    >
                        <h3 class="text-xl font-medium">{{ program.name }}</h3>
                        <button class="bg-teal-500 w-12 h-12 rounded-xl flex items-center justify-center">
                            <svg
                                v-if="!opened.includes(program.id)"
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <svg
                                v-else
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M20 12H4" />
                            </svg>
                        </button>
                    </div>
                    <div v-show="opened.includes(program.id)" class="px-6 pb-6">
                        <p>{{ program.description }}</p>
                        <iframe
                            v-if="program.video_url"
                            :src="embedYoutube(program.video_url)"
                            class="w-full rounded-lg shadow-lg mt-4"
                            width="560"
                            height="315"
                            frameborder="0"
                            allowfullscreen
                        ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import AdminLayout from '../../layout/AdminLayout.vue'

const route = useRoute()
const course = ref({
    id: '', title: '', level: '', format: '', code: '', price: '', trainingPrograms: []
})
const form = ref({ name: '', description: '', video_url: '' })
const opened = ref([])
const fetchCourse = async () => {
    const response = await fetch(`/admin/courses/show/${route.params.id}`, {
        headers: {
            Accept: 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content,
        },
        credentials: 'include',
    });

    const data = await response.json();
    console.log('Курс с API:', data); // ← скажи, что тут выводится

    course.value = data;
};

const submitProgram = async () => {
    await fetch(`/admin/course/${course.value.id}/training-program`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            Accept: 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content,
        },
        credentials: 'include',
        body: JSON.stringify(form.value),
    })
    form.value = { name: '', description: '', video_url: '' }
    fetchCourse()
}

const toggle = (id) => {
    if (opened.value.includes(id)) {
        opened.value = opened.value.filter(i => i !== id)
    } else {
        opened.value = [id]
    }
}

const embedYoutube = (url) => {
    return url.replace('watch?v=', 'embed/')
}

onMounted(fetchCourse)
</script>


