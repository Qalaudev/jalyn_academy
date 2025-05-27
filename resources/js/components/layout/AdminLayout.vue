<template>
    <div class="flex">
        <Sidebar />
        <main class="flex-1 ml-64 p-6 bg-gray-100 min-h-screen">
            <slot />
        </main>
    </div>
</template>

<script setup>
import Sidebar from './Sidebar.vue';
</script>
