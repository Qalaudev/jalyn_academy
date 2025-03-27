@include('layout.header')
@include('layout.navbar')

<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-center mb-6">Курстар тізімі</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 text-center">
        <a href="{{ route('course_create_form') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded-lg shadow-md transition-all duration-300 ease-in-out inline-block">
            Курс қосу
        </a>
    </div>

    @if($courses->isEmpty())
        <p class="text-center text-gray-600 text-lg">Қазіргі уақытта курстар жоқ.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($courses as $course)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-all duration-300 hover:scale-105">
                    @if($course->image)
                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}"
                             class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 flex items-center justify-center bg-gray-200">
                            <p class="text-gray-500 text-lg font-semibold">Фото жоқ</p>
                        </div>
                    @endif

                    <div class="p-4">
                        <h2 class="text-xl font-semibold">{{ $course->title }}</h2>
                        <p class="text-gray-700 mt-2">{{ Str::limit($course->description, 100) }}</p>
                        <p class="text-gray-800 font-bold mt-2">Бағасы: {{ $course->price }} ₸</p>

                        <div class="mt-4 flex justify-between items-center gap-2 flex-wrap">
                            <a href="{{ route('course_show', $course->id) }}"
                               class="text-blue-600 hover:underline transition-all duration-300">Толығырақ</a>

                            <a href="{{ route('course_edit', $course->id) }}"
                               class="text-yellow-600 hover:underline transition-all duration-300">Өңдеу</a>

                            <form action="{{ route('course_delete', $course->id) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Бұл курсты жойғыңыз келе ме?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:underline transition-all duration-300">
                                    Жою
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
