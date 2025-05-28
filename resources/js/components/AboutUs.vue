<template>
    <Navbar></Navbar>
    <main class="flex-grow">
        <div class="max-w-5xl mx-auto px-4 py-10 min-h-[calc(100vh-160px)]">
            <div class="bg-white p-8 rounded-3xl shadow-md">
                <div class="mb-10 text-center">
                    <h1 class="text-4xl font-extrabold text-gray-800 mb-2 tracking-tight">👋 Біз туралы</h1>
                    <p class="text-gray-500 text-lg">Біз білім беру арқылы болашақты құрып жатырмыз 🚀</p>
                </div>

                <div class="text-gray-700 text-lg space-y-6 leading-relaxed">
                    <p>
                        Біздің платформа — бұл бағдарламалау және технология саласындағы дағдыларды дамытуға арналған заманауи оқу орталығы.
                        Біз әрбір студентке сапалы білім беру, тәжірибелік дағдыларды дамыту және IT саласына сенімді түрде енуге көмектесуді мақсат тұтамыз.
                    </p>

                    <p>
                        📌 Біз ұсынамыз:
                        <ul class="list-disc list-inside mt-2 text-gray-600">
                            <li>Практикаға негізделген курстар</li>
                            <li>Тәжірибелі менторлар</li>
                            <li>Қолайлы онлайн-оқу форматы</li>
                            <li>Кәсіпке бағытталған оқу бағдарламасы</li>
                        </ul>
                    </p>

                    <p>
                        Біздің мақсатымыз — жаңа буын бағдарламашыларды дайындау және олардың мансап жолында серіктес болу.
                        Біздің команда әрқашан сіздің дамуыңызға қолдау көрсетуге дайын.
                    </p>

                    <p class="font-semibold text-gray-800">
                        🌟 Бізбен бірге үйреніңіз, дамыңыз және табысқа жетіңіз!
                    </p>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>

import Navbar from "../components/layout/Navbar.vue";
</script>

<style scoped>

</style>
