@include('layout.navbar')
<div class="flex justify-center py-8 bg-gray-50 min-h-screen">
    <div class="w-full max-w-7xl bg-white rounded-lg shadow-lg flex">

        {{-- Бүйір мәзір --}}
        <aside class="w-64 bg-gray-100 border-r border-gray-300 rounded-l-lg">
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
                    <li class="relative">
                        <div
                            onclick="toggleMenus('{{ $program->id }}')"
                            class="block py-2 px-4 hover:bg-green-100 rounded-lg cursor-pointer flex justify-between items-center"
                        >
                            <span class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2-12H7a2 2 0 00-2 2v16l5-4h8a2 2 0 002-2V6a2 2 0 00-2-2z" />
                                </svg>
                                {{ $program->name }}
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 transition-transform transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <ul id="menus-{{ $program->id }}" class="ml-4 mt-1 space-y-1 hidden">
                            @forelse($program->menus as $menu)
                                <li
                                    class="py-1 px-3 bg-white hover:bg-green-50 rounded-lg text-gray-800 cursor-pointer flex items-center"
                                    onclick="showMenuDescription(`{!! addslashes($menu->description) !!}`)"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6M4 4h16v16H4z" />
                                    </svg>
                                    {{ $menu->name }}
                                </li>
                            @empty
                                <li class="py-1 px-3 text-gray-500 italic">
                                    Меню табылмады
                                </li>
                            @endforelse
                        </ul>
                    </li>
                @endforeach
            </ul>
        </aside>

        {{-- Негізгі контент --}}
        <main class="flex-1 p-8 rounded-r-lg">
            <h1 class="text-3xl font-bold mb-4">{{ $course->title }}</h1>

            {{-- Тестке өту батырмасы --}}
            @php
                $firstMenu = $course->trainingPrograms->flatMap->menus->first();
            @endphp

            @if($firstMenu)
                <button
                    onclick="location.href='{{ route('test.show', ['menu' => $firstMenu->id]) }}'"
                    class="mb-6 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
                >
                    Тестке өту
                </button>
            @endif

            <p id="program-description" class="text-gray-600 mb-4">Көру үшін бағдарламаны таңдаңыз.</p>

            @foreach($course->trainingPrograms as $program)
                <div id="program-{{ $program->id }}" class="px-6 pb-6">
                    <p>{{ $program->description }}</p>

                    {{-- Видео --}}
                    @if($program->video_url)
                        @php
                            $embedUrl = str_replace("watch?v=", "embed/", $program->video_url);
                        @endphp

                        <div class="flex justify-center">
                            <iframe
                                width="720"
                                height="405"
                                src="{{ $embedUrl }}"
                                title="{{ $program->name }}"
                                frameborder="0"
                                allowfullscreen
                                class="w-full max-w-4xl rounded-lg shadow-lg mt-4"
                            ></iframe>
                        </div>
                    @endif

                    {{-- Компилятор --}}
                    @if(str_contains($course->title, 'PHP'))
                        <div class="mt-8">
                            <h2 class="text-2xl font-bold mb-4">PHP Компиляторы</h2>
                            <form id="php-compiler-form">
                                @csrf
                                <textarea id="php-code" class="w-full h-40 p-4 bg-gray-800 text-white rounded-lg mb-4" placeholder="Мұнда PHP код жазыңыз..."></textarea>
                                <button onclick="executePHP(event)" class="bg-green-600 text-white py-2 px-4 rounded-lg">PHP орындау</button>
                                <div id="output" class="mt-4 bg-gray-800 text-white p-4 rounded-lg hidden"></div>
                            </form>
                        </div>
                    @elseif(str_contains($course->title, 'Python'))
                        <div class="mt-8">
                            <h2 class="text-2xl font-bold mb-4">Python Компиляторы</h2>
                            <form id="python-compiler-form">
                                @csrf
                                <textarea id="python-code" class="w-full h-40 p-4 bg-gray-800 text-white rounded-lg mb-4" placeholder="Мұнда Python код жазыңыз..."></textarea>
                                <button onclick="executePython(event)" class="bg-blue-600 text-white py-2 px-4 rounded-lg">Python орындау</button>
                                <div id="python-output" class="mt-4 bg-gray-800 text-white p-4 rounded-lg hidden"></div>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </main>

    </div>
</div>

<script>
    function toggleProgram(programId) {
        const allPrograms = document.querySelectorAll('.content');
        allPrograms.forEach(program => program.classList.add('hidden'));
        const selectedProgram = document.getElementById(`program-${programId}`);
        if (selectedProgram) {
            selectedProgram.classList.toggle('hidden');
        }
    }

    function executePHP(event) {
        event.preventDefault();
        const code = document.getElementById('php-code').value;
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/execute-php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({ code })
        })
            .then(response => response.text())
            .then(output => {
                const outputDiv = document.getElementById('output');
                outputDiv.innerHTML = output;
                outputDiv.classList.remove('hidden');
            })
            .catch(error => console.error('PHP қателігі:', error));
    }

    function executePython(event) {
        event.preventDefault();
        const code = document.getElementById('python-code').value;
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/execute-python', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({ code })
        })
            .then(response => response.text())
            .then(output => {
                const outputDiv = document.getElementById('python-output');
                outputDiv.innerHTML = output;
                outputDiv.classList.remove('hidden');
            })
            .catch(error => console.error('Python қателігі:', error));
    }

    function toggleMenus(id) {
        const el = document.getElementById(`menus-${id}`);
        if (!el) return;
        el.classList.toggle('hidden');
    }

    function showMenuDescription(description) {
        const descElem = document.getElementById('program-description');
        descElem.innerText = description;
        document.querySelectorAll('.content').forEach(block => {
            block.classList.add('hidden');
        });
    }
</script>
