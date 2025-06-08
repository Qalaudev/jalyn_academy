@include('layout.navbar')
<div class="flex justify-center py-8 bg-gray-50 min-h-screen">
    <div class="w-full max-w-7xl bg-white rounded-lg shadow-lg flex">

        <aside class="w-64 bg-gray-100 border-r border-gray-300 rounded-l-lg overflow-y-auto max-h-screen">
            <ul class="mt-8 space-y-1 text-gray-700">
                <li class="block py-2 px-4 bg-green-600 text-white rounded-lg font-semibold">
                    <a href="{{ route('course_index') }}">Басты бет</a>
                </li>
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
                        >
                            {{ $program->name }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </aside>

        {{-- Орталық контент --}}
        <main class="flex-1 p-8 rounded-r-lg overflow-y-auto max-h-screen">
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
        </main>

    </div>
</div>

<script>
    document.querySelectorAll('.program-btn').forEach(button => {
        button.addEventListener('click', () => {
            const name = button.getAttribute('data-name');
            const description = button.getAttribute('data-description');
            const videoUrl = button.getAttribute('data-video');

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
        });
    });
</script>
