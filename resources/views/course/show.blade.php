@include('layout.header')
@include('layout.navbar')

<div class="container mx-auto px-4 py-8 flex justify-center">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden max-w-2xl w-full">
        <div class="relative bg-gradient-to-r from-blue-500 to-indigo-600 h-56 flex items-center justify-center">
            @if($course->image)
                <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}"
                     class="absolute inset-0 w-full h-full object-cover opacity-90">
            @else
                <p class="text-white text-lg font-semibold">Фото жоқ</p>
            @endif
        </div>

        <div class="p-6">
            <h1 class="text-4xl font-extrabold text-gray-900">{{ $course->title }}</h1>
            <p class="text-gray-600 text-lg mt-3">{{ $course->description }}</p>

            <div class="mt-4 flex items-center justify-between">
                <span class="text-2xl font-bold text-blue-600">{{ $course->price }} ₸</span>
                <div class="flex gap-3">
                    <a href="{{ route('course_edit', $course->id) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 px-5 rounded-lg shadow-md transition">
                        Өңдеу
                    </a>
                    <a href="{{ route('course_index') }}"
                       class="bg-gray-800 hover:bg-gray-900 text-white font-medium py-2 px-5 rounded-lg shadow-md transition">
                        Тізімге қайту
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
