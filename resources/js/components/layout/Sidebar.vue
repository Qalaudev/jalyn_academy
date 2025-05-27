<!-- components/Sidebar.vue -->
<template>
    <aside class="fixed top-0 left-0 w-64 h-screen bg-gray-50 dark:bg-gray-800">
        <div class="h-full px-3 py-4 overflow-y-auto">
            <ul class="space-y-2 font-medium">
                <SidebarItem icon="🏠" text="Дэшборд" to="/admin-page" />
                <SidebarItem icon="🧑‍💼" text="Пайдаланушылар" to="/admin-page/users" />
                <SidebarItem icon="📚" text="Курстар" to="/admin-page/courses" />
                <SidebarItem icon="📋" text="Меню" to="/admin-page/create-menu" />
                <SidebarItem icon="📝" text="Тест" to="/admin-page/questions/create" />
                <SidebarItem icon="📊" text="Статистика" to="/admin-page/stats" />
                <SidebarItem icon="⚙️" text="Баптаулар" to="/admin-page/settings" />
                <SidebarItem icon="❓" text="Көмек" to="/admin-page/help" />
                <li>
                    <form @submit.prevent="logout">
                        <button
                            type="submit"
                            class="w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                        >
                            <span class="text-xl mr-2">🚪</span>
                            <span class="flex-1 whitespace-nowrap">Шығу</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </aside>
</template>

<script setup>
import SidebarItem from './SidebarItem.vue';
import { useRouter } from 'vue-router';

const router = useRouter();

const logout = async () => {
    await fetch('/logout', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
            Accept: 'application/json',
        },
        credentials: 'include',
    });
    router.push('/testlogin');
};
</script>
