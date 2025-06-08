@include('admin.index')

<div class="relative max-h-[400px] mt-[20px] ml-[350px] mr-[100px]">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">ID</th>
            <th scope="col" class="px-6 py-3">Title</th>
            <th scope="col" class="px-6 py-3">Level</th>
            <th scope="col" class="px-6 py-3">Format</th>
            <th scope="col" class="px-6 py-3">Code</th>
            <th scope="col" class="px-6 py-3">Price</th>
        </tr>
        </thead>
        <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$course->id}}
            </th>
            <td class="px-6 py-4">{{ $course->title }}</td>
            <td class="px-6 py-4">{{$course->level}}</td>
            <td class="px-6 py-4">{{$course->format}}</td>
            <td class="px-6 py-4">{{$course->code}}</td>
            <td class="px-6 py-4">{{$course->price}}</td>
        </tr>
        </tbody>
    </table>


    <form action="{{ route('admin.courseTrainingProgram', $course->id) }}" method="POST" class="mt-6 space-y-4 max-w-xl mx-auto">
        @csrf
        <div class="sm:col-span-2 sm:col-start-1">
            <label for="attention" class="block text-sm font-medium text-gray-900">Название</label>
            <div class="mt-2">
                <input type="text" name="name" id="name" autocomplete="address-level2"
                       class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
            </div>
        </div>

        <div class="sm:col-span-2">
            <label for="description" class="block text-sm font-medium text-gray-900">Описание</label>
            <div class="mt-2">
                <textarea name="description" id="description" rows="3" cols="30"
                          class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm resize-none"></textarea>
            </div>
        </div>

        <div class="sm:col-span-2">
            <label for="video_url" class="block text-sm font-medium text-gray-900">
                Ссылка на видео с YouTube (доступ только по ссылке)
            </label>
            <div class="mt-2">
                <textarea name="video_url" id="video_url" rows="3" cols="30"
                          class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm resize-none"></textarea>
            </div>
        </div>

        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-300 ease-in-out focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Добавить
        </button>
    </form>
    <h1 class="text-center text-3xl mt-6"><b>Программа обучения</b></h1>

    <div class="container mx-auto px-4 py-8">
        @foreach($course->trainingPrograms as $program)
            <div class="border border-gray-700 rounded-xl mb-4">
                <div class="flex justify-between items-center p-6 cursor-pointer toggle-accordion">
                    <h3 class="text-xl font-medium">{{ $program->name }}</h3>

                    <div class="flex items-center space-x-2">
                        {{-- Edit батырмасы --}}
                        <button
                            class="edit-btn bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700"
                            data-id="{{ $program->id }}"
                            data-name="{{ e($program->name) }}"
                            data-description="{{ e($program->description) }}"
                            data-video="{{ $program->video_url }}"
                        >
                            Изменить
                        </button>

                        <button class="bg-teal-500 w-12 h-12 rounded-xl flex items-center justify-center icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white plus-icon" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white minus-icon hidden" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="px-6 pb-6 hidden content">
                    <p>{{ $program->description }}</p>

                    @if($program->video_url)
                        @php
                            $embedUrl = str_replace("watch?v=", "embed/", $program->video_url);
                        @endphp
                        <iframe
                            width="560"
                            height="315"
                            src="{{ $embedUrl }}"
                            title="{{ $program->name }}"
                            frameborder="0"
                            allowfullscreen
                            class="w-full rounded-lg shadow-lg mt-4"
                        ></iframe>
                    @endif
                </div>
            </div>
        @endforeach

    </div>
    <!-- Модальнің өзі -->
    <div id="edit-modal" class="fixed inset-0 bg-blue-50 bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
            <button id="close-modal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-xl font-bold">&times;</button>

            <h2 class="text-2xl mb-4 font-semibold">Редактировать программу</h2>

            <form id="edit-form" method="POST" action="">
                @csrf
                @method('POST')

                <input type="hidden" name="program_id" id="program_id">

                <div class="mb-4">
                    <label for="edit-name" class="block mb-1 font-medium">Название</label>
                    <input type="text" name="name" id="edit-name" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="edit-description" class="block mb-1 font-medium">Описание</label>
                    <textarea name="description" id="edit-description" rows="4" class="w-full border rounded px-3 py-2"></textarea>
                </div>

                <div class="mb-4">
                    <label for="edit-video_url" class="block mb-1 font-medium">Ссылка на видео (YouTube)</label>
                    <input type="url" name="video_url" id="edit-video_url" class="w-full border rounded px-3 py-2">
                </div>

                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
                    Сохранить
                </button>
            </form>
        </div>
    </div>

</div>
<script>

    const modal = document.getElementById('edit-modal');
    const closeModalBtn = document.getElementById('close-modal');
    const editForm = document.getElementById('edit-form');

    // Батырмаларға оқиға қосу
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', () => {
            // Бағдарлама мәліметтерін алу
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const description = button.getAttribute('data-description');
            const video = button.getAttribute('data-video');

            // Модальды ашу
            modal.classList.remove('hidden');

            // Форманы толтыру
            document.getElementById('program_id').value = id;
            document.getElementById('edit-name').value = name;
            document.getElementById('edit-description').value = description;
            document.getElementById('edit-video_url').value = video;

            // Форманың action-ін орнату (Laravel route)
            editForm.action = `/admin/courses/${id}/update`;
        });
    });

    // Модальді жабу
    closeModalBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    // Модальді сыртынан басқанда жабу
    window.addEventListener('click', (e) => {
        if(e.target === modal){
            modal.classList.add('hidden');
        }
    });

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
<style>
    #edit-modal {
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
    }
</style>
