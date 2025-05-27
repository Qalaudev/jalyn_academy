<template>
    <li>
        <router-link
            :to="to"
            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
        >
            <span class="text-xl mr-2">{{ icon }}</span>
            <span class="flex-1 whitespace-nowrap">{{ text }}</span>
            <span v-if="badge" class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">
        {{ badge }}
      </span>
        </router-link>
    </li>
</template>

<script setup>
defineProps({
    to: String,
    text: String,
    icon: String,
    badge: String
})
</script>
