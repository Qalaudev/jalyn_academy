<!--<template>-->
<!--    <div class="flex items-center justify-center min-h-screen bg-gray-100">-->
<!--        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">-->
<!--            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Test Кіру</h2>-->
<!--            <form @submit.prevent="onRecaptchaSubmit" class="space-y-4">-->
<!--                <div>-->
<!--                    <label for="email" class="block text-gray-700 font-medium">Email</label>-->
<!--                    <input-->
<!--                        type="email"-->
<!--                        id="email"-->
<!--                        v-model="email"-->
<!--                        placeholder="Email"-->
<!--                        required-->
<!--                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"-->
<!--                    />-->
<!--                </div>-->
<!--                <div>-->
<!--                    <label for="password" class="block text-gray-700 font-medium">Пароль</label>-->
<!--                    <input-->
<!--                        type="password"-->
<!--                        id="password"-->
<!--                        v-model="password"-->
<!--                        placeholder="Пароль"-->
<!--                        required-->
<!--                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"-->
<!--                    />-->
<!--                </div>-->
<!--                <button-->
<!--                    type="submit"-->
<!--                    class="w-full bg-blue-500 text-white p-3 rounded-lg font-semibold hover:bg-blue-600 transition"-->
<!--                >-->
<!--                    Кіру-->
<!--                </button>-->
<!--            </form>-->
<!--            <p class="text-center text-gray-600 mt-4">-->
<!--                Тіркелгіңіз жоқ па?-->
<!--                <a href="/testregister" class="text-blue-500 font-semibold">Тіркелу</a>-->
<!--            </p>-->
<!--        </div>-->
<!--    </div>-->
<!--</template>-->

<!--<script>-->

<!--export default {-->
<!--    name: 'LoginForm',-->
<!--    data() {-->
<!--        return {-->
<!--            email: '',-->
<!--            password: '',-->
<!--            recaptchaSiteKey: '6Lfxm00rAAAAAHK2Qegt6PPfC1Stu4D42Pg1QvSR'-->
<!--        };-->
<!--    },-->
<!--    methods: {-->
<!--        onRecaptchaSubmit() {-->
<!--            if (!window.grecaptcha) {-->
<!--                alert('reCAPTCHA жүктелмеді, парақты жаңартыңыз');-->
<!--                return;-->
<!--            }-->
<!--            window.grecaptcha.ready(() => {-->
<!--                window.grecaptcha.execute(this.recaptchaSiteKey, { action: 'submit' }).then(token => {-->
<!--                    this.submitForm(token);-->
<!--                });-->
<!--            });-->
<!--        },-->
<!--        // async submitForm(token) {-->
<!--        //     console.log('reCAPTCHA token:', token);-->
<!--        //     try {-->
<!--        //         const response = await fetch('http://127.0.0.1:8000/login', {-->
<!--        //             method: 'POST',-->
<!--        //             headers: {-->
<!--        //                 'Content-Type': 'application/json',-->
<!--        //                 Accept: 'application/json',-->
<!--        //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),-->
<!--        //             },-->
<!--        //             body: JSON.stringify({-->
<!--        //                 email: this.email,-->
<!--        //                 password: this.password,-->
<!--        //                 'g-recaptcha-response': token,-->
<!--        //             }),-->
<!--        //         });-->
<!--        //-->
<!--        //         const data = await response.json();-->
<!--        //         if (response.ok) {-->
<!--        //             console.log('Кіру сәтті:', data);-->
<!--        //             this.$router.push('/admin-page');-->
<!--        //         } else {-->
<!--        //             alert(data.message || 'Қате мәліметтер енгізілді.');-->
<!--        //         }-->
<!--        //     } catch (error) {-->
<!--        //         console.error('Кіру кезінде қате:', error);-->
<!--        //     }-->
<!--        // },-->
<!--    },-->
<!--    mounted() {-->
<!--        if (!window.grecaptcha) {-->
<!--            console.error('grecaptcha не загружен');-->
<!--        } else {-->
<!--            console.log('grecaptcha загружен', window.grecaptcha);-->
<!--        }-->
<!--    }-->


<!--};-->

<!--</script>-->

