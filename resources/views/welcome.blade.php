<!DOCTYPE html>
<html lang="kk">
<head>
    @include('layout.header')
</head>
@include('layout.navbar')
<body class="bg-slate-900 min-h-screen flex flex-col">
    <div class="text-slate-100 min-h-screen flex items-center justify-center relative overflow-hidden">

        <img src="{{asset('images/figma.svg')}}" alt="Figma" class="absolute left-100 top-1/4 w-32 animate-bounce">
        <img src="{{asset('images/golang.svg')}}" alt="Go" class="absolute right-200 top-10 w-48 animate-pulse">
        <img src="{{asset('images/java.svg')}}" alt="Java" class="absolute right-320 bottom-10 w-48 animate-spin">

        <div class="text-center max-w-2xl px-4" >
            <h1 class="text-5xl font-extrabold leading-tight">
                JALYN ACADEMY
            </h1>
            <p class="text-3xl mt-4 font-bold text-slate-100">
                – IT әлемге  <br> жаңа қадам
            </p>
            <p class="text-lg mt-4 text-slate-400">
                <b>It-де табысты мансапты үйреніңіз, дамыңыз және құрыңыз!</b>
            </p>

            <button id="scroll-btn" class="mt-6 px-6 py-3 bg-cyan-400 text-slate-900 font-semibold rounded hover:bg-cyan-500 transition">
                Консультацию алу
            </button>
        </div>
    </div>
    <div class="container mx-auto px-4 py-10 text-white">
        <h1 class="text-5xl font-bold mb-10 text-white">Біздің курстар</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Advanced Java Developer Card -->
            @foreach($courses as $course)
                <div
                    class="bg-[#1e293b] border border-[#334155] rounded-2xl p-6 cursor-pointer"
                    onclick="openModal(this)"
                    data-course='@json($course)'
                >
                    <h2 class="text-2xl font-semibold mb-2">{{$course->title}}</h2>
                    <p class="text-gray-400 mb-4">{{$course->description}}</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-gray-800 px-3 py-1 rounded-full text-sm">Недельи: {{$course->duration_weeks}}</span>
                        <span class="bg-gray-800 px-3 py-1 rounded-full text-sm">{{$course->schedule}}</span>
                        <span class="bg-gray-800 px-3 py-1 rounded-full text-sm">Уровень: {{$course->level}}</span>
                        <span class="bg-gray-800 px-3 py-1 rounded-full text-sm">Формат: {{$course->format}}</span>
                        <span class="bg-gray-800 px-3 py-1 rounded-full text-sm">Старт: {{$course->start_date}}</span>
                        <span class="bg-gray-800 px-3 py-1 rounded-full text-sm">Осталось: <span class="text-cyan-400">{{$course->spots_left}}</span></span>
                    </div>
                    <div class="flex justify-between items-end">
                        <div class="bg-red-600 px-4 py-1 rounded-full text-white font-semibold">0-0-12</div>
                        <div class="text-2xl font-bold text-cyan-400">{{$course->price}} ₸</div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <!-- Модаль фон -->
    <div id="courseModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 hidden">
        <div class="bg-[#1e293b] rounded-xl w-full max-w-xl p-6 relative text-white">
            <!-- Жабу батырмасы -->
            <button onclick="closeModal()" class="absolute top-2 right-2 text-white text-2xl">&times;</button>

            <h2 id="modalTitle" class="text-3xl font-bold mb-4"></h2>
            <p id="modalDescription" class="text-gray-400 mb-4"></p>

            <ul class="space-y-2 text-sm">
                <li><strong>Ұзақтығы:</strong> <span id="modalDuration"></span> апта</li>
                <li><strong>Кесте:</strong> <span id="modalSchedule"></span></li>
                <li><strong>Деңгей:</strong> <span id="modalLevel"></span></li>
                <li><strong>Формат:</strong> <span id="modalFormat"></span></li>
                <li><strong>Басталуы:</strong> <span id="modalStart"></span></li>
                <li><strong>Орын қалды:</strong> <span id="modalSpots"></span></li>
            </ul>

            <div class="text-right mt-6 text-2xl font-bold text-cyan-400" id="modalPrice"></div>
        </div>
    </div>



    <section class="bg-[#111827] py-16 px-4 md:px-16">
        <h2 class="text-4xl font-bold text-white text-center mb-16">Неліктен біз?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 max-w-6xl mx-auto">
            <!-- Card 1 -->
            <div class="flex flex-col items-center text-center">
                <img src="{{asset('images/human_comp-removebg-preview.png')}}" alt="Программа" class="h-40 mb-6" />
                <h3 class="text-xl font-bold text-white mb-2">Сапалы бағдарлама</h3>
                <p class="text-slate-300 max-w-sm">
                    Курстар, мазмұн, тапсырмалар, бейнематериалдар, тәлімгерлер, басқа студенттермен өзара әрекеттесу, тестілеу және үлгерімді бағалау, сертификаттау
                </p>
            </div>

            <!-- Card 2 -->
            <div class="flex flex-col items-center text-center">
                <img src="{{asset('images/analytics-removebg-preview.png')}}" alt="Трудоустройство" class="h-40 mb-6" />
                <h3 class="text-xl font-bold text-white mb-2">Жұмысқа орналасуға көмек</h3>
                <p class="text-slate-300 max-w-sm">
                    JALYN Academy-де көптеген IT-компаниялармен серіктестік бар, олар мамандар іздейді, ал біз түлектеріміздің деректерін сұхбаттасуға жібереміз.
                </p>
            </div>

            <!-- Card 3 -->
            <div class="flex flex-col items-center text-center">
                <img src="{{asset('images/lightbulb_human-removebg-preview.png')}}" alt="Платформа" class="h-40 mb-6" />
                <h3 class="text-xl font-bold text-white mb-2">Ыңғайлы платформа</h3>
                <p class="text-slate-300 max-w-sm">
                    Әр студентке біздің платформаға барлық бейне сабақтармен, дәрістермен, тапсырмалармен және тесттермен қол жетімділік беріледі
                </p>
            </div>

            <!-- Card 4 -->
            <div class="flex flex-col items-center text-center">
                <img src="{{asset('images/teacher_human-removebg-preview.png')}}" alt="Преподаватели" class="h-40 mb-6" />
                <h3 class="text-xl font-bold text-white mb-2">Тәжірибелі оқытушылар</h3>
                <p class="text-slate-300 max-w-sm">
                    Біздің жаттықтырушылар қазіргі әзірлеушілер болып табылады, бұл оларға өзекті білім беруге және студенттермен практикалық тәжірибемен бөлісуге мүмкіндік береді
                </p>
            </div>
        </div>
    </section>
    <div class="container mx-auto px-4 py-16">
        <!-- Заголовок -->
        <h1 class="text-4xl md:text-5xl font-bold text-center mb-20 text-white">Біздің студенттердің сәттілік тарихы:</h1>

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
                        <div class="w-10 h-10 rounded-full bg-[#4C6FFF] mr-3">
                            <img src="/api/placeholder/40/40" alt="Мейр Кумаш" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <p class="font-semibold text-[#FFDE59]">Мейр Кумаш</p>
                            <p class="text-xs text-[#D1D5DB]">Java разработчик</p>
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

    <!-- Кнопка вверх -->
    <div class="fixed bottom-6 right-6">
        <button class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-gray-600 transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </button>
    </div>

    <div class="container mx-auto px-4 py-16">
        <!-- FAQ аккордеон -->
        <div class="max-w-[1370px] mx-auto text-white">

            <!-- Вопрос 1 -->
            <div class="mb-4">
                <div class="border border-gray-700 rounded-xl">
                    <div class="flex justify-between items-center p-6 cursor-pointer toggle-accordion">
                        <h3 class="text-xl font-medium">Аптасына қанша сағат курсқа баруым керек?</h3>
                        <button class="bg-teal-500 w-12 h-12 rounded-xl flex items-center justify-center icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white plus-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white minus-icon hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                            </svg>
                        </button>
                    </div>
                    <div class="px-6 pb-6 hidden content">
                        <p>Курсты аяқтауға кететін орташа уақыт аптасына 6-дан 10 сағатқа дейін. Бұған дәрістерді қарау, үй тапсырмаларын орындау және воркшоптарға қатысу кіреді.</p>
                    </div>
                </div>
            </div>

            <!-- Вопрос 2 -->
            <div class="mb-4">
                <div class="border border-gray-700 rounded-xl">
                    <div class="flex justify-between items-center p-6 cursor-pointer toggle-accordion">
                        <h3 class="text-xl font-medium">Курсты аяқтағаннан кейін мен қаншалықты тез жұмысқа тұра аламын?</h3>
                        <button class="bg-teal-500 w-12 h-12 rounded-xl flex items-center justify-center icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white plus-icon hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white minus-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                            </svg>
                        </button>
                    </div>
                    <div class="px-6 pb-6 content">
                        <p class="mb-4">
                            Біздің түлектердің 77% - ы курсты аяқтағаннан кейін 1-2 ай ішінде жұмыс табады,
                            ал кейбіреулері бірден ұсыныстар алады.
                            Мұның бәрі сізге және өзін-өзі таныстыру қабілетіңізге байланысты.
                            Курс қорытынды жобаны сәтті аяқтаған түлектер үшін салынған,
                            көп қиындықсыз жұмысқа орналасуға дайын.
                        </p>
                        <p>
                            Курсты аяқтағаннан кейін сіз серіктестер мен компаниялардың өзекті бос жұмыс орындарымен біздің Telegram арнасына кіре аласыз.
                            Егер сізде жұмыс табуда қиындықтар туындаса,
                            біз академиямызда тағылымдамадан өту мүмкіндігін ұсынамыз.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Вопрос 3 -->
            <div class="mb-4">
                <div class="border border-gray-700 rounded-xl">
                    <div class="flex justify-between items-center p-6 cursor-pointer toggle-accordion">
                        <h3 class="text-xl font-medium">Оқыту қандай форматта өтеді?</h3>
                        <button class="bg-teal-500 w-12 h-12 rounded-xl flex items-center justify-center icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white plus-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white minus-icon hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                            </svg>
                        </button>
                    </div>
                    <div class="px-6 pb-6 hidden content">
                        <p>Оқыту онлайн режимінде, сабақ жазбаларына қол жетімділікпен өтеді,
                            тәжірибеге және сұрақтарды талдауға арналған тәлімгерлермен және тікелей масштабтау сессияларымен сөйлесу.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="feedback" class="max-w-[1399px] mx-auto px-4 py-16">
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
                    <form id="contactForm" method="POST" action="{{ route('contact.send') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-[#E0F2FE] mb-1">Атыңыз</label>
                            <input type="text" name="name" class="w-full px-4 py-2 rounded-lg bg-[#243447] text-white border border-[#3C4F63] focus:outline-none focus:ring-2 focus:ring-[#38BDF8]" placeholder="Атыңызды жазыңыз" required />
                        </div>
                        <div>
                            <label class="block text-[#E0F2FE] mb-1">Электронды пошта</label>
                            <input type="email" name="email" class="w-full px-4 py-2 rounded-lg bg-[#243447] text-white border border-[#3C4F63] focus:outline-none focus:ring-2 focus:ring-[#38BDF8]" placeholder="email@site.kz" required />
                        </div>
                        <div>
                            <label class="block text-[#E0F2FE] mb-1">Хабарлама</label>
                            <textarea rows="4" name="description" class="w-full px-4 py-2 rounded-lg bg-[#243447] text-white border border-[#3C4F63] focus:outline-none focus:ring-2 focus:ring-[#38BDF8]" placeholder="Қысқаша хабарлама..." required></textarea>
                        </div>

                        <button type="submit" id="submitBtn" class="relative bg-teal-500 hover:bg-[#1E40AF] text-white font-semibold px-6 py-2 rounded-lg transition-colors duration-300">
                            <span id="btnText">Жіберу</span>
                            <span id="btnLoader" class="hidden absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 animate-spin w-5 h-5 border-2 border-white border-t-transparent rounded-full"></span>
                            <span id="btnSuccess" class="hidden text-green-300 absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">&#10003;</span>
                        </button>
                    </form>

                    <div id="successMessage" class="mt-4 text-green-400 font-semibold hidden">Хабарлама сәтті жіберілді!</div>
                    <div id="errorMessage" class="mt-4 text-red-400 font-semibold hidden">Қате шықты. Қайта көріңіз.</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Кнопка вверх -->
    <div class="fixed bottom-6 right-6">
        <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-gray-600 transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </button>
    </div>

    <!-- Chat Widget HTML -->
    <div id="chat-widget" class="fixed bottom-4 right-4 z-50">
        <button onclick="toggleChat()" class="bg-gradient-to-r from-indigo-500 to-blue-600 text-white p-3 rounded-full shadow-2xl hover:scale-110 transition transform duration-300">
            🤖
        </button>
    </div>

    <!-- Chat Window -->
    <div id="chat-window" class="hidden fixed bottom-24 right-4 w-80 max-w-sm h-[480px] bg-white shadow-2xl rounded-2xl flex flex-col z-50 border border-gray-200 overflow-hidden animate__animated animate__fadeInUp">
        <!-- Header -->
        <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-center py-3 px-4 font-semibold text-lg">
            AI Чат
            <button onclick="toggleChat()" class="absolute right-3 top-3 text-white hover:text-gray-300 text-sm">✖</button>
        </div>

        <!-- Messages -->
        <div id="chat-messages" class="flex-1 px-4 py-3 overflow-y-auto text-sm space-y-3 bg-gray-50">
            <!-- Хабарламалар осында шығады -->
        </div>

        <!-- Input -->
        <div class="p-3 bg-white border-t border-gray-200 flex items-center space-x-2">
            <input
                id="chat-input"
                type="text"
                placeholder="Хабарлама жаз..."
                class="flex-1 text-sm px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                onkeydown="if(event.key==='Enter'){ sendMessage(); }"
            >
            <button
                onclick="sendMessage()"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm rounded-full transition"
            >
                Жіберу
            </button>
        </div>
    </div>


    <div class="bg-[#1A2533]">
        @include('layout.footer')
    </div>
</body>

</html>
<script>
    document.querySelectorAll('.toggle-accordion').forEach((toggle) => {
        toggle.addEventListener('click', () => {
            const content = toggle.parentElement.querySelector('.content');
            const plusIcon = toggle.querySelector('.plus-icon');
            const minusIcon = toggle.querySelector('.minus-icon');

            const isOpen = !content.classList.contains('hidden');

            document.querySelectorAll('.content').forEach(c => c.classList.add('hidden'));
            document.querySelectorAll('.plus-icon').forEach(i => i.classList.remove('hidden'));
            document.querySelectorAll('.minus-icon').forEach(i => i.classList.add('hidden'));

            if (!isOpen) {
                content.classList.remove('hidden');
                plusIcon.classList.add('hidden');
                minusIcon.classList.remove('hidden');
            }
        });
    });
    document.getElementById('scroll-btn').addEventListener('click', function () {
        document.getElementById('feedback').scrollIntoView({ behavior: 'smooth' });
    });

    const toggleChat = () => {
        const chatWindow = document.getElementById('chat-window');
        chatWindow.classList.toggle('hidden');
    };

    const sendMessage = () => {
        const input = document.getElementById('chat-input');
        const message = input.value.trim();
        if (!message) return;

        const messagesDiv = document.getElementById('chat-messages');

        const userMsg = document.createElement('div');
        userMsg.className = 'text-right';
        userMsg.innerHTML = `<span class="inline-block bg-gray-200 px-3 py-2 rounded">${message}</span>`;
        messagesDiv.appendChild(userMsg);

        // Scroll төменге
        messagesDiv.scrollTop = messagesDiv.scrollHeight;

        input.value = '';

        fetch('/ai-message', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ message: message })
        })
            .then(res => res.json())
            .then(data => {
                const botMsg = document.createElement('div');
                botMsg.className = 'text-left';
                botMsg.innerHTML = `<span class="inline-block bg-blue-100 px-3 py-2 rounded">${data.reply}</span>`;
                messagesDiv.appendChild(botMsg);
                messagesDiv.scrollTop = messagesDiv.scrollHeight;
            })
            .catch(err => {
                console.error('AI жауап қатпады', err);
            });
    };


    function openModal(element) {
        const course = JSON.parse(element.getAttribute('data-course'));

        document.getElementById('modalTitle').textContent = course.title;
        document.getElementById('modalDescription').textContent = course.description;
        document.getElementById('modalDuration').textContent = course.duration_weeks;
        document.getElementById('modalSchedule').textContent = course.schedule;
        document.getElementById('modalLevel').textContent = course.level;
        document.getElementById('modalFormat').textContent = course.format;
        document.getElementById('modalStart').textContent = course.start_date;
        document.getElementById('modalSpots').textContent = course.spots_left;
        document.getElementById('modalPrice').textContent = course.price + ' ₸';

        document.getElementById('courseModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('courseModal').classList.add('hidden');
    }

    document.getElementById('contactForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const form = this;
        const btnText = document.getElementById('btnText');
        const btnLoader = document.getElementById('btnLoader');
        const btnSuccess = document.getElementById('btnSuccess');
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');

        // Бастапқы қалып
        btnText.classList.add('hidden');
        btnLoader.classList.remove('hidden');
        successMessage.classList.add('hidden');
        errorMessage.classList.add('hidden');

        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                }
            });

            if (response.ok) {
                btnLoader.classList.add('hidden');
                btnSuccess.classList.remove('hidden');
                successMessage.classList.remove('hidden');
                form.reset();

                setTimeout(() => {
                    btnSuccess.classList.add('hidden');
                    btnText.classList.remove('hidden');
                }, 2000);
            } else {
                throw new Error("Сервер қатесі");
            }
        } catch (err) {
            btnLoader.classList.add('hidden');
            btnText.classList.remove('hidden');
            errorMessage.classList.remove('hidden');
        }
    });


</script>
