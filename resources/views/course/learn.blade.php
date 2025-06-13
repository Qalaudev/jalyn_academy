@include('layout.navbar')
<div class="flex justify-center py-8 bg-gray-50 min-h-screen">
    <div class="w-full max-w-7xl bg-white rounded-lg shadow-lg flex">

        <aside class="w-64 bg-gray-100 border-r border-gray-300 rounded-l-lg overflow-y-auto max-h-screen">
            <ul class="mt-8 space-y-1 text-gray-700">
{{--                <li class="block py-2 px-4 bg-green-600 text-white rounded-lg font-semibold">--}}
{{--                    <a href="{{ route('course_index') }}">Басты бет</a>--}}
{{--                </li>--}}
                <li>
                    <span class="block py-2 px-4 bg-green-600 text-white rounded-lg font-semibold">
                        {{ $course->title }}
                    </span>
                </li>

                {{-- Проверяем, есть ли программы обучения (уроки) для курса --}}
                @forelse($course->trainingPrograms as $index => $program)
                    <li>
                        <button
                            class="w-full text-left py-2 px-4 hover:bg-green-100 rounded-lg cursor-pointer focus:outline-none program-btn"
                            data-id="{{ $program->id }}"
                            data-name="{{ e($program->name) }}"
                            data-description="{{ e($program->description) }}"
                            data-video="{{ $program->video_url ? str_replace('watch?v=', 'embed/', $program->video_url) : '' }}"
                            data-lesson-id="{{ $program->id }}"
                            data-course-id="{{ $course->id }}"
                            data-lesson-order="{{ $index }}"
                        >
                            <span class="flex items-center justify-between">
                                <span>{{ $program->name }}</span>
                                <span class="lesson-status-icon ml-2"></span>
                            </span>
                        </button>
                    </li>
                @empty
                    <li class="block py-2 px-4 text-gray-500">Бұл курс үшін сабақтар табылмады.</li>
                @endforelse
            </ul>
        </aside>

        {{-- Орталық контент --}}
        <main class="flex-1 p-8 rounded-r-lg overflow-y-auto max-h-screen">
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2 progress-percentage-text">Сіздің прогрессіңіз: {{ round($userProgress->progress_percentage, 0) }}%</h2>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-green-600 h-2.5 rounded-full" style="width: {{ $userProgress->progress_percentage }}%"></div>
                </div>

                <h1 id="program-title" class="text-3xl font-bold mb-4">{{ $course->trainingPrograms->first()->name ?? 'Бағдарлама таңдалмаған' }}</h1>

                <div id="program-video" class="flex justify-center">
                    @if($course->trainingPrograms->first() && $course->trainingPrograms->first()->video_url)
                        <iframe
                            width="720"
                            height="405"
                            src="{{ str_replace('watch?v=', 'embed/', $course->trainingPrograms->first()->video_url) }}"
                            title="{{ $course->trainingPrograms->first()->name }}"
                            frameborder="0"
                            allowfullscreen
                            class="w-full max-w-4xl rounded-lg shadow-lg"
                        ></iframe>
                    @endif
                </div>

                <div id="program-description" class="text-gray-600 mt-6">
                    {!! nl2br(e($course->trainingPrograms->first()->description ?? '')) !!}
                </div>

                {{-- Результаты теста --}}
                @if(session('test_result'))
                    <div class="mt-6 p-4 bg-blue-100 border border-blue-200 text-blue-800 rounded-lg shadow-sm">
                        <h4 class="font-semibold text-lg mb-2">Тест нәтижесі:</h4>
                        <p>Сіз {{ session('test_result.score') }} / {{ session('test_result.total') }} дұрыс жауап бердіңіз.</p>
                    </div>
                @endif

                {{-- Раздел компилятора --}}
                <div class="mt-12 p-6 bg-gray-100 rounded-lg shadow-inner">
                    <h3 class="text-2xl font-semibold mb-4 text-gray-800">Код жаттықтырушы</h3>

                    <div class="mb-4">
                        <label for="language-select" class="block text-gray-700 text-sm font-bold mb-2">Тілді Танданыз:</label>
                        <select id="language-select" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="python">Python</option>
                            <option value="javascript">JavaScript</option>
                            <option value="java">Java</option>
                            <option value="cpp">C++</option>
                            <option value="php">PHP</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="code-input" class="block text-gray-700 text-sm font-bold mb-2">Кодыңызды енгізіңіз:</label>
                        <textarea id="code-input" rows="15" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline font-mono text-sm" placeholder="Напишите ваш код здесь..."></textarea>
                    </div>

                    <div class="text-center">
                        <button id="run-code-btn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full disabled:opacity-50 disabled:cursor-not-allowed">
                            Кодты іске қосыңыз
                        </button>
                    </div>

                    <div class="mt-6 p-4 bg-gray-200 rounded-lg shadow-inner">
                        <h4 class="text-xl font-semibold mb-2 text-gray-800">Қорытынды:</h4>
                        <pre id="code-output" class="bg-gray-800 text-green-300 p-3 rounded-md overflow-auto whitespace-pre-wrap"></pre>
                    </div>
                </div>

                {{-- Раздел тестов --}}
                <div class="mt-12 p-6 bg-white rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Тесттер</h3>
                    @forelse($course->trainingPrograms as $program)
                        @if($program->testQuestions->isNotEmpty())
                            <div class="mb-6 p-4 border border-gray-200 rounded-lg">
                                <h4 class="text-xl font-semibold mb-3 text-gray-700">{{ $program->name }} тесттері:</h4>
                                <ul class="list-disc pl-5 space-y-2">
                                    @foreach($program->testQuestions as $testQuestion)
                                        <li>
                                            <p class="text-gray-800">{{ $testQuestion->question }}</p>
                                            <a href="{{ route('test.show', $program->id) }}" class="text-blue-600 hover:text-blue-800 text-sm">Тестті бастау</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @empty
                        <p class="text-gray-600">Бұл курста тесттер әлі жоқ.</p>
                    @endforelse
                </div>

                {{-- Кнопка "Урок завершен" перемещена ниже компилятора --}}
                <div class="mt-6 text-center">
                    <button id="mark-lesson-completed-btn" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full disabled:opacity-50 disabled:cursor-not-allowed">
                        Өтілді
                    </button>
                </div>
            </div>
        </main>

    </div>
</div>

<script>
    let currentLessonId = {{ $course->trainingPrograms->first() ? $course->trainingPrograms->first()->id : 'null' }};
    const courseId = {{ $course->id }};
    let completedLessonIds = @json($userProgress->completed_lesson_ids ?? []);

    const markLessonBtn = document.getElementById('mark-lesson-completed-btn');
    const programButtons = document.querySelectorAll('.program-btn');

    function updateLessonStates() {
        programButtons.forEach(button => {
            const lessonId = parseInt(button.getAttribute('data-lesson-id'));
            const lessonOrder = parseInt(button.getAttribute('data-lesson-order'));
            const statusIcon = button.querySelector('.lesson-status-icon');

            button.classList.remove('locked-lesson', 'completed-lesson');
            button.removeAttribute('title');
            button.style.pointerEvents = '';
            button.style.opacity = '1';
            statusIcon.innerHTML = '';

            const isCompleted = completedLessonIds.includes(lessonId);
            const isFirstLesson = lessonOrder === 0;
            const previousLessonId = programButtons[lessonOrder - 1] ? parseInt(programButtons[lessonOrder - 1].getAttribute('data-lesson-id')) : null;
            const isPreviousLessonCompleted = previousLessonId !== null && completedLessonIds.includes(previousLessonId);

            if (isCompleted) {
                button.classList.add('completed-lesson');
                statusIcon.innerHTML = '<svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
                button.disabled = false;
            } else if (!isFirstLesson && !isPreviousLessonCompleted) {
                button.classList.add('locked-lesson');
                button.style.opacity = '0.5';
                button.style.pointerEvents = 'none';
                button.setAttribute('title', 'Заблокировано: завершите предыдущий урок');
                statusIcon.innerHTML = '<svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 7v2m0 0V7a3 3 0 00-3-3H7a3 3 0 00-3 3v2m8 0V7a3 3 0 013-3h1a3 3 0 013 3v2"></path></svg>';
            } else {
                button.disabled = false;
            }

            if (currentLessonId === lessonId) {
                markLessonBtn.disabled = isCompleted;
                markLessonBtn.style.display = isCompleted ? 'none' : '';
            }
        });
    }

    updateLessonStates();

    programButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            const lessonId = parseInt(button.getAttribute('data-lesson-id'));
            const lessonOrder = parseInt(button.getAttribute('data-lesson-order'));

            const isFirstLesson = lessonOrder === 0;
            const previousLessonId = programButtons[lessonOrder - 1] ? parseInt(programButtons[lessonOrder - 1].getAttribute('data-lesson-id')) : null;
            const isPreviousLessonCompleted = previousLessonId !== null && completedLessonIds.includes(previousLessonId);

            if (!isFirstLesson && !isPreviousLessonCompleted && !completedLessonIds.includes(lessonId)) {
                event.preventDefault();
                return;
            }

            const name = button.getAttribute('data-name');
            const description = button.getAttribute('data-description');
            const videoUrl = button.getAttribute('data-video');
            currentLessonId = lessonId;

            document.getElementById('program-title').innerText = name;
            document.getElementById('program-description').innerHTML = description.replace(/\n/g, "<br>");
            const videoContainer = document.getElementById('program-video');
            if(videoUrl) {
                videoContainer.innerHTML = `
                    <iframe
                        width="720"
                        height="405"
                        src="${videoUrl}"
                        title="${name}"
                        frameborder="0"
                        allowfullscreen
                        class="w-full max-w-4xl rounded-lg shadow-lg"
                    ></iframe>
                `;
            } else {
                videoContainer.innerHTML = '';
            }

            markLessonBtn.disabled = completedLessonIds.includes(currentLessonId);
            markLessonBtn.style.display = completedLessonIds.includes(currentLessonId) ? 'none' : '';
        });
    });

    document.getElementById('mark-lesson-completed-btn').addEventListener('click', function() {
        if (!currentLessonId) {
            console.warn('Не выбран урок для отметки');
            return;
        }

        const requestBody = {
            course_id: courseId,
            lesson_id: currentLessonId
        };
        console.log('Отправка AJAX-запроса с данными:', requestBody);

        fetch('{{ route('progress.markLessonCompleted') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(requestBody)
        })
        .then(response => response.json())
        .then(data => {
            document.querySelector('.progress-percentage-text').innerText = `Сіздің прогрессіңіз: ${data.progress_percentage}%`;

            const progressBar = document.querySelector('.bg-green-600.h-2\\.5.rounded-full');
            if (progressBar) {
                progressBar.style.width = `${data.progress_percentage}%`;
            }

            completedLessonIds = data.completed_lesson_ids || [];

            updateLessonStates();

            document.getElementById('mark-lesson-completed-btn').style.display = 'none';
        })
        .catch(error => {
            console.error('Ошибка при обновлении прогресса:', error);
        });
    });

    // Инициализация обработчика для кнопки "Запустить код"
    document.getElementById('run-code-btn').addEventListener('click', async function() {
        const language = document.getElementById('language-select').value;
        const code = document.getElementById('code-input').value;
        const outputDiv = document.getElementById('code-output');
        const runCodeBtn = document.getElementById('run-code-btn');

        outputDiv.innerText = 'Запуск кода...';
        outputDiv.style.color = 'yellow';
        runCodeBtn.disabled = true; // Отключаем кнопку во время выполнения

        try {
            const response = await fetch('{{ route('compiler.runCode') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ language, code })
            });

            const data = await response.json();

            if (response.ok) {
                outputDiv.innerText = data.output;
                outputDiv.style.color = data.status === 'success' ? 'greenyellow' : 'red';
            } else {
                outputDiv.innerText = `Ошибка (${response.status}): ${data.error || data.message || 'Неизвестная ошибка'}`;
                outputDiv.style.color = 'red';
            }
        } catch (error) {
            console.error('Ошибка при выполнении кода:', error);
            outputDiv.innerText = 'Произошла ошибка при отправке запроса к компилятору.';
            outputDiv.style.color = 'red';
        } finally {
            runCodeBtn.disabled = false; // Включаем кнопку обратно
        }
    });
</script>
