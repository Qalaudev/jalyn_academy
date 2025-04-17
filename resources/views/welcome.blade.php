<!DOCTYPE html>
<html lang="kk">
<head>
    @include('layout.header')
</head>
@include('layout.navbar')
<body class="bg-slate-900 min-h-screen flex flex-col">
    <div class="text-slate-100 min-h-screen flex items-center justify-center relative overflow-hidden">

        <!-- Анимацияланған иконкалар -->
        <img src="{{asset('images/figma.svg')}}" alt="Figma" class="absolute left-100 top-1/4 w-32 animate-bounce">
        <img src="{{asset('images/golang.svg')}}" alt="Go" class="absolute right-200 top-10 w-48 animate-pulse">
        <img src="{{asset('images/java.svg')}}" alt="Java" class="absolute right-320 bottom-10 w-48 animate-spin">

        <!-- Мәтін -->
        <div class="text-center max-w-2xl px-4" >
            <h1 class="text-5xl font-extrabold leading-tight">
                JALYN ACADEMY
            </h1>
            <p class="text-3xl mt-4 font-bold text-slate-100">
                – это новый подход <br> к IT образованию!
            </p>
            <p class="text-lg mt-4 text-slate-400">
                <b>Обучайся, развивайся и строй успешную карьеру в IT!</b>
            </p>

            <!-- Батырма -->
            <button id="scroll-btn" class="mt-6 px-6 py-3 bg-cyan-400 text-slate-900 font-semibold rounded hover:bg-cyan-500 transition">
                Получить консультацию
            </button>
        </div>
    </div>
    <div class="container mx-auto px-4 py-10 text-white">
        <h1 class="text-5xl font-bold mb-10 text-white">Наши курсы</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Advanced Java Developer Card -->
            @foreach($courses as $course)
            <div class="bg-[#1e293b] border border-[#334155] rounded-2xl p-6">
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

    <section class="bg-[#111827] py-16 px-4 md:px-16">
        <h2 class="text-4xl font-bold text-white text-center mb-16">Почему мы?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 max-w-6xl mx-auto">
            <!-- Card 1 -->
            <div class="flex flex-col items-center text-center">
                <img src="{{asset('images/human_comp-removebg-preview.png')}}" alt="Программа" class="h-40 mb-6" />
                <h3 class="text-xl font-bold text-white mb-2">Качественная программа</h3>
                <p class="text-slate-300 max-w-sm">
                    Курсы, контент, задачи, видеоматериалы, наставники, взаимодействие с другими учениками, тестирование и оценка успеваемости, сертификация
                </p>
            </div>

            <!-- Card 2 -->
            <div class="flex flex-col items-center text-center">
                <img src="{{asset('images/analytics-removebg-preview.png')}}" alt="Трудоустройство" class="h-40 mb-6" />
                <h3 class="text-xl font-bold text-white mb-2">Помощь с трудоустройством</h3>
                <p class="text-slate-300 max-w-sm">
                    У JALYN Academy много партнеров в ИТ-компаниях, которые ищут специалистов, и мы направляем данные наших выпускников для собеседования.
                </p>
            </div>

            <!-- Card 3 -->
            <div class="flex flex-col items-center text-center">
                <img src="{{asset('images/lightbulb_human-removebg-preview.png')}}" alt="Платформа" class="h-40 mb-6" />
                <h3 class="text-xl font-bold text-white mb-2">Удобная платформа</h3>
                <p class="text-slate-300 max-w-sm">
                    Каждому студенту предоставляется доступ к нашей платформе со всеми видеоуроками, лекциями, задачами и тестами
                </p>
            </div>

            <!-- Card 4 -->
            <div class="flex flex-col items-center text-center">
                <img src="{{asset('images/teacher_human-removebg-preview.png')}}" alt="Преподаватели" class="h-40 mb-6" />
                <h3 class="text-xl font-bold text-white mb-2">Опытные преподаватели</h3>
                <p class="text-slate-300 max-w-sm">
                    Наши тренеры являются действующими разработчиками, что позволяет им давать актуальные знания и делиться практическим опытом со студентами
                </p>
            </div>
        </div>
    </section>
    <div class="container mx-auto px-4 py-16">
        <!-- Заголовок -->
        <h1 class="text-4xl md:text-5xl font-bold text-center mb-20 text-white">Истории успеха наших студентов:</h1>

        <!-- Карточки студентов -->
        <div class="flex flex-wrap justify-center items-center gap-4 md:gap-6 mb-32">

            <!-- Карточка 1 -->
            <div class="w-64 h-110 group transform transition-transform duration-300 hover:-rotate-1">
                <div class="bg-[#1E1E2F] border border-[#4C6FFF] rounded-3xl p-6 h-full flex flex-col shadow-md hover:shadow-lg hover:shadow-[#4C6FFF]/40 transition-shadow duration-300 text-white">
                    <p class="text-sm text-[#F5F5F7] mb-6">
                        Для меня курсы в JALYN это было просто мечтой о бутерброде с обучением, а путь к своей цели-возможность попасть в сферу IT лучшего места, я стараюсь выбрать самые лучшие места действительно за них платить. Получив базовые знания в битлаб, я уже через 3 месяца после окончания 1 месячного курса обучения получил свой первый офер в Альфа банк. Некоторыми материалами пользуюсь до сих пор.
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
                        2019 сделал команда Алматы турында образование мектеб функц стандарттизация оты, иқаең хабж өлшем кесу осы емхаөа жрнал. Бизнес программамен бастап үстермеше жабын бүкіл академ дамиды тарабынан да қоғамда тұрды ашадын. Сабаq под организация бірнеше өтеді мигразиялар тұрлерінің болады dr біздің.
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
        <h2 class="text-4xl md:text-5xl font-bold text-center text-white">Часто задаваемые вопросы</h2>
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
                        <h3 class="text-xl font-medium">Сколько часов в неделю мне нужно будет уделять курсу?</h3>
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
                        <p>Среднее время, которое потребуется для прохождения курса — от 6 до 10 часов в неделю. Это включает просмотр лекций, выполнение домашних заданий и участие в воркшопах.</p>
                    </div>
                </div>
            </div>

            <!-- Вопрос 2 -->
            <div class="mb-4">
                <div class="border border-gray-700 rounded-xl">
                    <div class="flex justify-between items-center p-6 cursor-pointer toggle-accordion">
                        <h3 class="text-xl font-medium">Насколько быстро я смогу трудоустроиться после завершения курса?</h3>
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
                            77% наших выпускников находят работу в течение 1-2 месяцев после окончания курса, а некоторые получают предложения сразу. Всё зависит от вас и вашей способности к самопрезентации. Курс построен так, что выпускники, успешно завершившие финальный проект, готовы к трудоустройству без особых сложностей.
                        </p>
                        <p>
                            После окончания курса вы также получаете доступ в наш Telegram-канал с актуальными вакансиями от партнеров и компаний. Если у вас возникнут сложности с поиском работы, мы предлагаем возможность пройти стажировку в нашей академии.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Вопрос 3 -->
            <div class="mb-4">
                <div class="border border-gray-700 rounded-xl">
                    <div class="flex justify-between items-center p-6 cursor-pointer toggle-accordion">
                        <h3 class="text-xl font-medium">В каком формате проходит обучение?</h3>
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
                        <p>Обучение проходит онлайн, с доступом к записям занятий, чатам с наставниками и живыми Zoom-сессиями для практики и разбора вопросов.</p>
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

    <!-- Кнопка вверх -->
    <div class="fixed bottom-6 right-6">
        <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-gray-600 transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </button>
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
</script>
