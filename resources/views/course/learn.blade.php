@include('layout.header')
<div class="flex justify-center py-8 bg-gray-50 min-h-screen">
    <div class="w-full max-w-7xl bg-white rounded-lg shadow-lg flex">
        <aside class="w-64 bg-gray-100 border-r border-gray-300 rounded-l-lg">
            <ul class="mt-8 space-y-1 text-gray-700">
                <li>
                    <a href="#" class="block py-2 px-4 bg-green-600 text-white rounded-lg font-semibold">{{$course->title}}</a>
                </li>
                @foreach($course->trainingPrograms as $program)
                    <li class="relative">
                        <div onclick="toggleProgram('{{ $program->id }}')" class="block py-2 px-4 hover:bg-green-100 rounded-lg cursor-pointer flex justify-between items-center">
                            {{$program->name}}
                            <span class="transition-transform transform">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 plus-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </aside>
        <main class="flex-1 p-8 rounded-r-lg">
            <h1 id="program-title" class="text-3xl font-bold mb-4">{{$course->title}}</h1>
            <p id="program-description" class="text-gray-600 mb-4">Выберите программу для просмотра.</p>
            @foreach($course->trainingPrograms as $program)
                <div id="program-{{ $program->id }}" class="px-6 pb-6 hidden content">
                    <p>{{ $program->description }}</p>
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
                </div>
            @endforeach
        </main>
    </div>
</div>

<script>
    function toggleAccordion(element) {
        const content = element.nextElementSibling;
        const plusIcon = element.querySelector('.plus-icon');
        const minusIcon = element.querySelector('.minus-icon');

        content.classList.toggle('hidden');
        plusIcon.classList.toggle('hidden');
        minusIcon.classList.toggle('hidden');
    }

    function toggleProgram(programId) {
        const allPrograms = document.querySelectorAll('.content');
        allPrograms.forEach(program => program.classList.add('hidden'));
        const selectedProgram = document.getElementById(`program-${programId}`);
        if (selectedProgram) {
            selectedProgram.classList.toggle('hidden');
        }
    }

</script>
