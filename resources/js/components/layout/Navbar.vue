<template>
    <nav class="bg-white shadow-md py-4">
        <div class="container mx-auto px-4 flex items-center justify-between">
            <div class="flex items-center space-x-8">
                <div class="flex items-center gap-3">
                    <router-link to="/" class="flex items-center gap-2">
                        <img src="/images/jalyn_logo.jpg" alt="Logo" class="h-10 w-10 rounded-full object-cover" />
                        <span class="text-lg font-bold text-gray-800">Jalyn</span>
                    </router-link>
                </div>

                <ul class="hidden md:flex space-x-6 font-semibold">
                    <li><router-link to="/" class="hover:text-blue-600">Басты бет</router-link></li>
                    <li><router-link to="/about-us" class="hover:text-blue-600">Біз туралы</router-link></li>
                    <li><router-link to="/courses" class="hover:text-blue-600">Курстар</router-link></li>
                    <li><router-link to="/contact" class="hover:text-blue-600">Контакты</router-link></li>

                    <template v-if="user?.role === 'Admin'">
                        <li><router-link to="/admin/roles" class="hover:text-blue-600">Рольдер</router-link></li>
                        <li><router-link to="/admin/roles/create" class="hover:text-blue-600">Рольдер құру</router-link></li>
                    </template>
                </ul>
            </div>

            <div class="relative flex items-center space-x-4">
                <template v-if="user">
                    <div class="relative inline-block text-left">
                        <div @click="toggleDropdown" class="flex items-center space-x-3 cursor-pointer">
                            <img :src="user.avatar || '/images/default-avatar.jpg'" alt="Avatar" class="h-10 w-10 rounded-full border" />
                            <span class="text-gray-700">{{ user.name }}</span>
                        </div>

                        <div v-if="dropdownOpen" class="absolute right-0 top-full mt-2 w-48 bg-white border rounded-lg shadow-lg z-50">
                            <template v-if="user.role === 'Admin'">
                                <router-link to="/admin/dashboard" class="block px-4 py-2 hover:bg-gray-200">Админ Панель</router-link>
                                <router-link to="/admin/courses/create" class="block px-4 py-2 hover:bg-gray-200">Создать курс</router-link>
                            </template>
                            <button @click="logout" class="w-full text-left block px-4 py-2 hover:bg-gray-200">Выйти</button>
                        </div>
                    </div>
                </template>

                <template v-else>
                    <router-link to="/testlogin" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Войти</router-link>
                    <router-link to="/testregister" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Регистрация</router-link>
                </template>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'Navbar',
    data() {
        return {
            user: null,
            dropdownOpen: false,
        };
    },
    created() {
        this.fetchUser();
    },
    methods: {
        async fetchUser() {
            try {
                const res = await fetch('/login', {
                    headers: {
                        Accept: 'application/json',
                    },
                    credentials: 'include',
                });
                if (res.ok) {
                    this.user = await res.json();
                }
            } catch (err) {
                console.error('User fetch error', err);
            }
        },
        toggleDropdown() {
            this.dropdownOpen = !this.dropdownOpen;
        },
        async logout() {
            try {
                await fetch('/logout', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        Accept: 'application/json',
                    },
                    credentials: 'include',
                });
                this.user = null;
                this.$router.push('/login');
            } catch (err) {
                console.error('Logout error', err);
            }
        },
    },
};
</script>

<style scoped>
</style>
