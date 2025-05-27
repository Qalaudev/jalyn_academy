<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Test Тіркелу</h2>
            <form @submit.prevent="submitForm" class="space-y-4">
                <div>
                    <label for="name" class="block text-gray-700 font-medium">Аты</label>
                    <input
                        type="text"
                        id="name"
                        v-model="name"
                        placeholder="Аты"
                        required
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    />
                </div>
                <div>
                    <label for="email" class="block text-gray-700 font-medium">Email</label>
                    <input
                        type="email"
                        id="email"
                        v-model="email"
                        placeholder="Email"
                        required
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    />
                </div>
                <div>
                    <label for="password" class="block text-gray-700 font-medium">Пароль</label>
                    <input
                        type="password"
                        id="password"
                        v-model="password"
                        placeholder="Пароль"
                        required
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    />
                </div>
                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white p-3 rounded-lg font-semibold hover:bg-blue-600 transition"
                >
                    Тіркелу
                </button>
            </form>
            <p class="text-center text-gray-600 mt-4">
                Аккаунтыңыз бар ма?
                <a href="/testlogin" class="text-blue-500 font-semibold">Кіру</a>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'RegisterForm',
    data() {
        return {
            name: '',
            email: '',
            password: '',
        };
    },
    methods: {
        async submitForm() {
            try {
                const response = await fetch('http://localhost:8000/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        Accept: 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({
                        name: this.name,
                        email: this.email,
                        password: this.password,
                    }),
                });

                const data = await response.json();
                if (response.ok) {
                    console.log('Тіркелу сәтті:', data);
                } else {
                    alert(data.message || 'Тіркелу кезінде қате болды');
                }
            } catch (error) {
                console.error('Қате:', error);
                alert('Қате орын алды. Кейінірек қайталап көріңіз.');
            }
        },
    },
};
</script>
