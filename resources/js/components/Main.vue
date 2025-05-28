<template>
    <div class="bg-slate-900 min-h-screen flex items-center justify-center relative overflow-hidden flex-col">
        <!-- Абсолютті позицияланған суреттер -->
        <img src="/public/images/figma.svg" alt="Figma" class="absolute left-20 top-1/4 w-32 animate-bounce" />
        <img src="/public/images/golang.svg" alt="Go" class="absolute right-20 top-10 w-48 animate-pulse" />
        <img src="/public/images/java.svg" alt="Java" class="absolute right-80 bottom-10 w-48 animate-spin" />

        <!-- Мәтін орталықта -->
        <div class="text-center max-w-2xl px-4 z-10">
            <h1 class="text-5xl font-extrabold leading-tight text-slate-100">
                JALYN ACADEMY
            </h1>
            <p class="text-3xl mt-4 font-bold text-slate-100">
                – IT әлемге <br /> жаңа қадам
            </p>
            <p class="text-lg mt-4 text-slate-400">
                <b>It-де табысты мансапты үйреніңіз, дамыңыз және құрыңыз!</b>
            </p>

            <button
                id="scroll-btn"
                class="mt-6 px-6 py-3 bg-cyan-400 text-slate-900 font-semibold rounded hover:bg-cyan-500 transition"
            >
                Консультацию алу
            </button>
        </div>
    </div>

    <!--List courses-->
    <div class="bg-slate-900 py-16 text-white">
        <div class="container mx-auto px-4 py-10">
            <h1 class="text-5xl font-bold mb-10">Біздің курстар</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div v-for="course in courses" :key="course.id" class="bg-[#1e293b] border border-[#334155] rounded-2xl p-6">
                    <h2 class="text-2xl font-semibold mb-2">{{ course.title }}</h2>
                    <p class="text-gray-400 mb-4">{{ course.description }}</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-gray-800 px-3 py-1 rounded-full text-sm">Недельи: {{ course.duration_weeks }}</span>
                        <span class="bg-gray-800 px-3 py-1 rounded-full text-sm">{{ course.schedule }}</span>
                        <span class="bg-gray-800 px-3 py-1 rounded-full text-sm">Уровень: {{ course.level }}</span>
                        <span class="bg-gray-800 px-3 py-1 rounded-full text-sm">Формат: {{ course.format }}</span>
                        <span class="bg-gray-800 px-3 py-1 rounded-full text-sm">Старт: {{ course.start_date }}</span>
                        <span class="bg-gray-800 px-3 py-1 rounded-full text-sm">Осталось: <span class="text-cyan-400">{{ course.spots_left }}</span></span>
                    </div>
                    <div class="flex justify-between items-end">
                        <div class="bg-red-600 px-4 py-1 rounded-full text-white font-semibold">0-0-12</div>
                        <div class="text-2xl font-bold text-cyan-400">{{ course.price }} ₸</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--why us-->
    <section class="bg-slate-900 py-16 px-4 md:px-16">
        <h2 class="text-4xl font-bold text-white text-center mb-16">Неліктен біз?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 max-w-6xl mx-auto">
            <!-- Card 1 -->
            <div class="flex flex-col items-center text-center">
                <img src="/public/images/human_comp-removebg-preview.png" alt="Программа" class="h-40 mb-6" />
                <h3 class="text-xl font-bold text-white mb-2">Сапалы бағдарлама</h3>
                <p class="text-slate-300 max-w-sm">
                    Курстар, мазмұн, тапсырмалар, бейнематериалдар, тәлімгерлер, басқа студенттермен өзара әрекеттесу, тестілеу және үлгерімді бағалау, сертификаттау
                </p>
            </div>

            <!-- Card 2 -->
            <div class="flex flex-col items-center text-center">
                <img src="/public/images/analytics-removebg-preview.png" alt="Трудоустройство" class="h-40 mb-6" />
                <h3 class="text-xl font-bold text-white mb-2">Жұмысқа орналасуға көмек</h3>
                <p class="text-slate-300 max-w-sm">
                    JALYN Academy-де көптеген IT-компаниялармен серіктестік бар, олар мамандар іздейді, ал біз түлектеріміздің деректерін сұхбаттасуға жібереміз.
                </p>
            </div>

            <!-- Card 3 -->
            <div class="flex flex-col items-center text-center">
                <img src="/public/images/lightbulb_human-removebg-preview.png" alt="Платформа" class="h-40 mb-6" />
                <h3 class="text-xl font-bold text-white mb-2">Ыңғайлы платформа</h3>
                <p class="text-slate-300 max-w-sm">
                    Әр студентке біздің платформаға барлық бейне сабақтармен, дәрістермен, тапсырмалармен және тесттермен қол жетімділік беріледі
                </p>
            </div>

            <!-- Card 4 -->
            <div class="flex flex-col items-center text-center">
                <img src="/public/images/teacher_human-removebg-preview.png" alt="Преподаватели" class="h-40 mb-6" />
                <h3 class="text-xl font-bold text-white mb-2">Тәжірибелі оқытушылар</h3>
                <p class="text-slate-300 max-w-sm">
                    Біздің жаттықтырушылар қазіргі әзірлеушілер болып табылады, бұл оларға өзекті білім беруге және студенттермен практикалық тәжірибемен бөлісуге мүмкіндік береді
                </p>
            </div>
        </div>
    </section>

    <!-- Success stories of our students -->
    <div class="bg-slate-900 w-full px-4 py-16">
        <!-- Заголовок -->
        <h1 class="container text-4xl md:text-5xl font-bold text-center mb-20 text-white">Біздің студенттердің сәттілік тарихы:</h1>
        <!-- Карточки студентов -->
        <div class="flex flex-wrap justify-center items-center gap-4 md:gap-6 mb-32">
            <!-- Карточка 1 -->
            <div class="w-64 h-110 group transform transition-transform duration-300 hover:-rotate-1">
                <div class="bg-[#1E1E2F] border border-[#4C6FFF] rounded-3xl p-6 h-full flex flex-col shadow-md hover:shadow-lg hover:shadow-[#4C6FFF]/40 transition-shadow duration-300 text-white">
                    <p class="text-sm text-[#F5F5F7] mb-6">
                        JALYN-дегі курстар мен үшін оқытумен бірге берілетін бутерброд туралы арман сияқты болды, ал өз мақсатыма жету - IT саласына кіруге мүмкіндік.
                        Мен әрдайым ең жақсы жерлерді таңдап, шынайы баға төлеуге тырысамын.
                        Bitlab-тан негізгі білім алған соң, бір айлық курсты аяқтағаннан кейін небәрі 3 ай өткенде Альфа Банктен алғашқы жұмыс ұсынысымды алдым.
                        Кейбір материалдарды әлі күнге дейін пайдаланамын.
                    </p>
                    <div class="mt-auto flex items-center">
                        <div class="w-10 h-10 rounded-full bg-[#4C6FFF] mr-3"></div>
                        <div>
                            <p class="font-semibold text-[#FFDE59]">Сакен Амиров</p>
                            <p class="text-xs text-[#D1D5DB]">Java разработчик</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Карточка 2 -->
            <div class="w-64 h-110 group transform transition-transform duration-300 hover:-rotate-1">
                <div class="bg-[#1E1E2F] border border-[#4C6FFF] rounded-3xl p-6 h-full flex flex-col shadow-md hover:shadow-lg hover:shadow-[#4C6FFF]/40 transition-shadow duration-300 text-white">
                    <p class="text-sm text-[#F5F5F7] mb-6">
                        2019 жылы Алматы қаласында білім беру саласы бойынша мектеп функцияларын стандарттау мақсатында арнайы команда құрылды. Бұл топ оқу процесін оңтайландыру мен сапасын арттыру бағытында жұмыс жүргізді. Сонымен қатар, бизнес бағдарламалары енгізіліп, академиялық даму мен қоғам алдындағы жауапкершілік арта түсті. Сабақтар бірнеше ұйымда өткізіліп, миграциялық үрдістердің түрлі формалары қарастырылды.
                    </p>
                    <div class="mt-auto flex items-center">
                        <div class="w-10 h-10 rounded-full bg-[#4C6FFF] mr-3"></div>
                        <div>
                            <p class="font-semibold text-[#FFDE59]">Ардак Сием</p>
                            <p class="text-xs text-[#D1D5DB]">PHP разработчик</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Карточка 3 (центральная) -->
            <div class="w-64 h-110 group transform transition-transform duration-300 hover:-rotate-1">
                <div class="bg-[#1E1E2F] border border-[#4C6FFF] rounded-3xl p-6 h-full flex flex-col shadow-md hover:shadow-lg hover:shadow-[#4C6FFF]/40 transition-shadow duration-300 text-white">
                    <p class="text-sm text-[#F5F5F7] mb-6">
                        В первых месяцах учебы в JALYN было сложно. Задачи казались невозможными для решения. Однако благодаря тренеру, я нашла в себе силы перебороть страх, после его слов мотивацию старалась решать все задачи и усваивать материал. Через 6 месяцев успешно завершила курс и получила предложение пройти стажировку в компании ALABS!
                    </p>
                    <div class="mt-auto flex items-center">
                        <div class="w-10 h-10 rounded-full bg-[#4C6FFF] mr-3"></div>
                        <div>
                            <p class="font-semibold text-[#FFDE59]">Мейір Кожахметов</p>
                            <p class="text-xs text-[#D1D5DB]">Python разработчик</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Карточка 4 -->
            <div class="w-64 h-110 group transform transition-transform duration-300 hover:-rotate-1">
                <div class="bg-[#1E1E2F] border border-[#4C6FFF] rounded-3xl p-6 h-full flex flex-col shadow-md hover:shadow-lg hover:shadow-[#4C6FFF]/40 transition-shadow duration-300 text-white">
                    <p class="text-sm text-[#F5F5F7] mb-6">
                        Обучение в школе программирования дало мне хорошую основу для дальнейшей работы, я многому научился и усовершенствовал навыки программирования, приобрел уверенность в том, что могу решать программистские задачи максимально точное обучение.
                    </p>
                    <div class="mt-auto flex items-center">
                        <div class="w-10 h-10 rounded-full bg-[#4C6FFF] mr-3"></div>
                        <div>
                            <p class="font-semibold text-[#FFDE59]">Тимур Кожахметов</p>
                            <p class="text-xs text-[#D1D5DB]">PHP разработчик</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Карточка 5 -->
            <div class="w-64 h-110 group transform transition-transform duration-300 hover:-rotate-1">
                <div class="bg-[#1E1E2F] border border-[#4C6FFF] rounded-3xl p-6 h-full flex flex-col shadow-md hover:shadow-lg hover:shadow-[#4C6FFF]/40 transition-shadow duration-300 text-white">
                    <p class="text-sm text-[#F5F5F7] mb-6">
                        Я учился в школе JALYN на QA-программистов и у меня под болышей мнений тем что даже сложные концепции становятся мне понятными. Благодаря сильному ментору я получил знания и основы язык и получил уверенность в решении реальных задач.
                    </p>
                    <div class="mt-auto flex items-center">
                        <div class="w-10 h-10 rounded-full bg-[#4C6FFF] mr-3"></div>
                        <div>
                            <p class="font-semibold text-[#FFDE59]">Арифе Женисов</p>
                            <p class="text-xs text-[#D1D5DB]">QA специалист</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Часто задаваемые вопросы -->
        <h2 class="text-4xl md:text-5xl font-bold text-center text-white">Жиі қойылатын сұрақтар</h2>
    </div>

    <!-- The up button -->
<!--    <div class="bg-slate-900 fixed bottom-6 right-6">-->
<!--        <button class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-gray-600 transition-colors duration-300">-->
<!--            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
<!--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />-->
<!--            </svg>-->
<!--        </button>-->
<!--    </div>-->

    <!-- Frequently asked questions -->
    <div class="bg-slate-900 py-16 text-white w-full">
        <div class="container mx-auto px-4">
            <div
                v-for="(item, index) in faqItems"
                :key="index"
                class="mb-4 border border-gray-700 rounded-xl"
            >
                <div
                    class="flex justify-between items-center p-6 cursor-pointer"
                    @click="toggleAccordion(index)"
                >
                    <h3 class="text-xl font-medium">{{ item.question }}</h3>
                    <button class="bg-teal-500 w-12 h-12 rounded-xl flex items-center justify-center">
                        <svg
                            v-if="openIndex !== index"
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 text-white"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <svg
                            v-else
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 text-white"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                        </svg>
                    </button>
                </div>
                <div v-show="openIndex === index" class="px-6 pb-6">
                    <p v-for="(answer, i) in item.answer" :key="i" class="mb-2">{{ answer }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-slate-900 py-16">
        <div id="feedback" class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-10 items-start">
                <!-- Text section -->
                <div class="w-full md:w-1/2">
                    <h2 class="text-4xl font-bold text-[#E0F2FE] mb-4">Біздің командаға қосылыңыз!</h2>
                    <p class="text-[#B3C5D6] text-lg mb-6">
                        Біз талантты және мақсатқа ұмтылған адамдарды іздейміз. Төмендегі форманы толтырып, бізбен байланысқа шығыңыз!
                    </p>
                    <ul class="list-disc list-inside text-[#B3C5D6] space-y-2">
                        <li>Ыңғайлы жұмыс уақыты</li>
                        <li>Қашықтан жұмыс істеу мүмкіндігі</li>
                        <li>Тәжірибелі менторлар</li>
                    </ul>
                </div>

                <!-- Form section -->
                <div class="w-full md:w-1/2 bg-[#1A2533] p-6 rounded-xl shadow-lg">
                    <form class="space-y-4">
                        <div>
                            <label class="block text-[#E0F2FE] mb-1">Атыңыз</label>
                            <input type="text" class="w-full px-4 py-2 rounded-lg bg-[#243447] text-white border border-[#3C4F63] focus:outline-none focus:ring-2 focus:ring-[#38BDF8]" placeholder="Атыңызды жазыңыз" />
                        </div>
                        <div>
                            <label class="block text-[#E0F2FE] mb-1">Электронды пошта</label>
                            <input type="email" class="w-full px-4 py-2 rounded-lg bg-[#243447] text-white border border-[#3C4F63] focus:outline-none focus:ring-2 focus:ring-[#38BDF8]" placeholder="email@site.kz" />
                        </div>
                        <div>
                            <label class="block text-[#E0F2FE] mb-1">Хабарлама</label>
                            <textarea rows="4" class="w-full px-4 py-2 rounded-lg bg-[#243447] text-white border border-[#3C4F63] focus:outline-none focus:ring-2 focus:ring-[#38BDF8]" placeholder="Қысқаша хабарлама..."></textarea>
                        </div>
                        <button type="submit" class="bg-teal-500 hover:bg-[#1E40AF] text-white font-semibold px-6 py-2 rounded-lg transition-colors duration-300">Жіберу</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--up button-->
    <div class="fixed bottom-6 right-6">
        <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-gray-600 transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </button>
    </div>

    <!-- aI button -->
    <div class="fixed bottom-4 right-4 z-50">
            <button
                @click="toggleChat"
                class="bg-gradient-to-r from-indigo-500 to-blue-600 text-white p-3 rounded-full shadow-2xl hover:scale-110 transition transform duration-300"
            >
                🤖
            </button>
        </div>

    <!-- Chat Window -->
    <div
            v-if="isOpen"
            class="fixed bottom-24 right-4 w-80 max-w-sm h-[480px] bg-white shadow-2xl rounded-2xl flex flex-col z-50 border border-gray-200 overflow-hidden animate__animated animate__fadeInUp"
        >
            <!-- Header -->
            <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-center py-3 px-4 font-semibold text-lg">
                AI Чат
                <button
                    @click="toggleChat"
                    class="absolute right-3 top-3 text-white hover:text-gray-300 text-sm"
                >
                    ✖
                </button>
            </div>

            <!-- Messages -->
            <div
                id="chat-messages"
                class="flex-1 px-4 py-3 overflow-y-auto text-sm space-y-3 bg-gray-50"
            >
                <div
                    v-for="(msg, index) in messages"
                    :key="index"
                    class="bg-white px-4 py-2 rounded shadow text-black"
                >
                    {{ msg }}
                </div>
            </div>

            <!-- Input -->
            <div class="p-3 bg-white border-t border-gray-200 flex items-center space-x-2">
                <input
                    v-model="newMessage"
                    @keydown.enter="sendMessage"
                    type="text"
                    placeholder="Хабарлама жаз..."
                    class="flex-1 text-sm px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                />
                <button
                    @click="sendMessage"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm rounded-full transition"
                >
                    Жіберу
                </button>
            </div>
        </div>

    <!--footer-->
    <div class="bg-[#1A2533] pt-16 pb-16">
        <footer class="flex flex-col space-y-10 justify-center">
            <nav class="flex justify-center flex-wrap gap-6 text-gray-500 font-medium">
                <a class="hover:text-gray-900" href="#">Home</a>
                <a class="hover:text-gray-900" href="#">About</a>
                <a class="hover:text-gray-900" href="#">Services</a>
                <a class="hover:text-gray-900" href="#">Media</a>
                <a class="hover:text-gray-900" href="#">Gallery</a>
                <a class="hover:text-gray-900" href="#">Contact</a>
            </nav>
            <div class="flex justify-center space-x-5">
                <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
                    <img src="https://img.icons8.com/fluent/30/000000/facebook-new.png" />
                </a>
                <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer">
                    <img src="https://img.icons8.com/fluent/30/000000/linkedin-2.png" />
                </a>
                <a href="https://instagram.com" target="_blank" rel="noopener noreferrer">
                    <img src="https://img.icons8.com/fluent/30/000000/instagram-new.png" />
                </a>
                <a href="https://messenger.com" target="_blank" rel="noopener noreferrer">
                    <img src="https://img.icons8.com/fluent/30/000000/facebook-messenger--v2.png" />
                </a>
                <a href="https://twitter.com" target="_blank" rel="noopener noreferrer">
                    <img src="https://img.icons8.com/fluent/30/000000/twitter.png" />
                </a>
            </div>
            <p class="text-center text-gray-700 font-medium text-white">&copy; 2025 JALYN Company. All rights reservered.</p>
        </footer>
    </div>

</template>



<script>
export default {
    name: 'Main.vue',
    data()
    {
        return {
            courses:[],
            openIndex: null,
            faqItems: [
                {
                    question: 'Аптасына қанша сағат курсқа баруым керек?',
                    answer: [
                        'Курсты аяқтауға кететін орташа уақыт аптасына 6-дан 10 сағатқа дейін.',
                        'Бұған дәрістерді қарау, үй тапсырмаларын орындау және воркшоптарға қатысу кіреді.'
                    ]
                },
                {
                    question: 'Курсты аяқтағаннан кейін мен қаншалықты тез жұмысқа тұра аламын?',
                    answer: [
                        'Біздің түлектердің 77% - ы курсты аяқтағаннан кейін 1-2 ай ішінде жұмыс табады.',
                        'Кейбіреулері бірден ұсыныстар алады.',
                        'Егер жұмыс табу қиын болса, академиямызда тағылымдамадан өту мүмкіндігі бар.'
                    ]
                },
                {
                    question: 'Оқыту қандай форматта өтеді?',
                    answer: [
                        'Оқыту онлайн режимінде өтеді, сабақ жазбаларына қол жетімділікпен.',
                        'Сұрақтарды талдауға арналған масштабтау сессиялары болады.'
                    ]
                }
            ],
            isOpen:false,
            newMessages:"",
            messages:[],
        };
    },
    methods: {
        async fetchCourses(){
            try {
                const response = await fetch('http://localhost:8000/courses/courses');
                this.courses = await response.json();
            } catch (error){
                console.error('Error fetching courses:', error);
            }
        },
        toggleAccordion(index) {
            this.openIndex = this.openIndex === index ? null : index;
        },
        setupScroll() {
            const btn = document.getElementById('scroll-btn');
            const target = document.getElementById('feedback');
            if (btn && target) {
                btn.addEventListener('click', () => {
                    target.scrollIntoView({ behavior: 'smooth' });
                });
            }
        },
        toggleChat(){
            this.isOpen = !this.isOpen;
        },
        sendMessage(){
            if (this.newMessage.trim() !== "") {
                this.messages.push(this.newMessage);
                this.newMessage = "";
                this.$nextTick(() => {
                    const container = this.$el.querySelector("#chat-messages");
                    container.scrollTop = container.scrollHeight;
                });
            }
        }
    },
    mounted() {
        this.fetchCourses();
        this.setupScroll();
    }

}

</script>

<style>
</style>
