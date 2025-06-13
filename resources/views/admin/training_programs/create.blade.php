@include('admin.index')

<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold mb-6">Создать новую программу обучения</h1>

    <form action="{{ route('training_programs.store') }}" method="POST" class="mt-6 space-y-4 max-w-xl mx-auto">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Название</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Описание</label>
            <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
        </div>

        <div>
            <label for="course_id" class="block text-sm font-medium text-gray-700">Курс</label>
            <select name="course_id" id="course_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="video_url" class="block text-sm font-medium text-gray-700">Ссылка на видео (YouTube)</label>
            <input type="url" name="video_url" id="video_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                Сохранить
            </button>
        </div>
    </form>
</div>
