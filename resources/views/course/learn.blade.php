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

                @foreach($course->trainingPrograms as $program)
                    <li>
                        <button
                            class="w-full text-left py-2 px-4 hover:bg-green-100 rounded-lg cursor-pointer focus:outline-none program-btn"
                            data-id="{{ $program->id }}"
                            data-name="{{ e($program->name) }}"
                            data-description="{{ e($program->description) }}"
                            data-video="{{ $program->video_url ? str_replace('watch?v=', 'embed/', $program->video_url) : '' }}"
                            data-lesson-id="{{ $program->id }}"
                            data-course-id="{{ $course->id }}"
                        >
                            {{ $program->name }}
                        </button>
                    </li>
                @endforeach
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

                <div id="program-description" class="text-gray-600 mb-6">
                    {!! nl2br(e($course->trainingPrograms->first()->description ?? '')) !!}
                </div>

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

                <div class="mt-6 text-center">
                    <button id="mark-lesson-completed-btn" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full disabled:opacity-50 disabled:cursor-not-allowed">
                        Урок завершен
                    </button>
                    <div id="certificate-section" class="mt-4">
                        @if($certificate)
                            <p class="text-green-600 mt-2">Курс аяқталды! Сіз сертификат алдыңыз.</p>
                            <a href="{{ route('certificates.show', $certificate->id) }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Сертификатты көру/Жүктеу
                            </a>
                        @elseif($userProgress->is_completed)
                            <p class="text-green-600 mt-2">Курс аяқталды! Сіз сертификат алуға дайынсыз.</p>
                            <a href="javascript:void(0);" id="generate-certificate-btn" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Сертификатты генерациялау
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </main>

    </div>
</div>

<script>
    let currentLessonId = {{ $course->trainingPrograms->first() ? $course->trainingPrograms->first()->id : 'null' }};
    const courseId = {{ $course->id }};

    const markLessonBtn = document.getElementById('mark-lesson-completed-btn');
    if (currentLessonId) {
        markLessonBtn.disabled = false;
    } else {
        markLessonBtn.disabled = true;
    }

    document.querySelectorAll('.program-btn').forEach(button => {
        button.addEventListener('click', () => {
            const name = button.getAttribute('data-name');
            const description = button.getAttribute('data-description');
            const videoUrl = button.getAttribute('data-video');
            currentLessonId = button.getAttribute('data-lesson-id'); // Обновляем текущий ID урока

            // Жаңарту орталықтағы тақырыпты
            document.getElementById('program-title').innerText = name;

            // Сипаттаманы жаңарту
            // nl2br үшін <br> қосу керек болса, бекендте қосылды, мұнда жай текст қойылады
            document.getElementById('program-description').innerHTML = description.replace(/\n/g, "<br>");

            // Видео жаңарту
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
                videoContainer.innerHTML = ''; // Егер видео жоқ болса, алып тастау
            }

            // Скрыть/показать кнопку "Урок завершен" в зависимости от того, есть ли текущий урок
            const markLessonBtn = document.getElementById('mark-lesson-completed-btn');
            if (currentLessonId) {
                markLessonBtn.disabled = false; // Включить кнопку
            } else {
                markLessonBtn.disabled = true; // Отключить кнопку, если урок не выбран
            }
        });
    });

    // Обработчик для кнопки "Урок завершен"
    document.getElementById('mark-lesson-completed-btn').addEventListener('click', function() {
        if (!currentLessonId) {
            console.warn('Не выбран урок для отметки');
            return;
        }

        // Отправка AJAX-запроса для обновления прогресса
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
            // Обновление прогресса на странице
            document.querySelector('.progress-percentage-text').innerText = `Сіздің прогрессіңіз: ${data.progress_percentage}%`;
            document.querySelector('.bg-green-600.h-25.rounded-full').style.width = `${data.progress_percentage}%`;

            // Если курс завершен, показать ссылку на сертификат
            const certificateSection = document.getElementById('certificate-section');
            if (data.is_completed) {
                // Убедимся, что внутри контейнера нет кнопки, если она уже есть
                if (!certificateSection.querySelector('a[href*="certificates"]')) {
                    // Если сертификат уже создан, показывать ссылку на просмотр
                    // Иначе, показывать кнопку для генерации
                    if (data.certificate_id) {
                        certificateSection.innerHTML = `
                            <p class="text-green-600 mt-2">Курс аяқталды! Сіз сертификат алдыңыз.</p>
                            <a href="/certificates/${data.certificate_id}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Сертификатты көру/Жүктеу
                            </a>
                        `;
                    } else {
                         // Этого блока по идее быть не должно, т.к. firstOrCreate уже генерирует.
                         // Но на всякий случай, если логика изменится или произойдет что-то непредвиденное.
                        certificateSection.innerHTML = `
                            <p class="text-green-600 mt-2">Курс аяқталды! Сіз сертификат алуға дайынсыз.</p>
                            <a href="javascript:void(0);" id="generate-certificate-btn" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Сертификатты генерациялау
                            </a>
                        `;
                    }
                }
            } else {
                certificateSection.innerHTML = ''; // Очищаем контейнер, если курс не завершен
            }
            // Отключить кнопку после завершения урока (если нужно)
            document.getElementById('mark-lesson-completed-btn').disabled = true;
        })
        .catch(error => {
            console.error('Ошибка при обновлении прогресса:', error);
        });
    });

    // Обработчик для кнопки 'Сертификатты генерациялау'
    // Этот блок будет нужен, если сертификат не генерируется автоматически при 100%.
    // Сейчас он генерируется в контроллере markLessonCompleted, так что этот блок может быть избыточен.
    document.addEventListener('click', function(event) {
        if (event.target && event.target.id === 'generate-certificate-btn') {
            // Здесь можно добавить AJAX-запрос для принудительной генерации сертификата,
            // если он не был создан автоматически. Сейчас это не требуется,
            // так как Certificate::firstOrCreate() делает это в контроллере markLessonCompleted.
            alert('Сертификат генерацияланып жатыр...');
            // Перенаправить на страницу сертификатов после генерации или обновить UI
            window.location.href = '{{ route('certificates.index') }}';
        }
    });
</script>
