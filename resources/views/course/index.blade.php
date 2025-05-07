<!doctype html>
<html lang="en" class="h-full">
<head>
    @include('layout.header')
</head>
<body class="bg-gray-100 h-full flex flex-col">
@include('layout.navbar')

<main class="flex-grow">
    <div class="max-w-7xl mx-auto px-4 py-10 min-h-[calc(100vh-160px)]"> {{-- 160px = navbar + footer высота примерно --}}
        <div class="bg-white p-8 rounded-3xl shadow-md">
            <div class="mb-10 text-center">
                <h1 class="text-4xl font-extrabold text-gray-800 mb-2 tracking-tight">📚 Курстар тізімі</h1>
                <p class="text-gray-500 text-lg">Білім алу — болашаққа салынған инвестиция 🌟</p>
            </div>

            @if(session('success'))
                <div class="bg-green-500 text-white p-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($courses as $course)
                    <div class="bg-white shadow-md rounded-2xl p-5 hover:shadow-lg transition duration-300">
                        <h2 class="text-xl font-semibold mb-2 text-gray-800">{{ $course->title }}</h2>
                        <p class="text-gray-600 mb-3">{{ $course->description }}</p>

                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm text-gray-500">Формат: {{ $course->format }}</span>
                            <span class="text-sm text-gray-500">Деңгей: {{ $course->level }}</span>
                        </div>

                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm text-gray-500">Басталу күні: {{ \Carbon\Carbon::parse($course->start_date)->format('d.m.Y') }}</span>
                            <span class="text-sm text-gray-500">Орын саны: {{ $course->spots_left }}</span>
                        </div>

                        <div class="text-lg font-bold text-green-600 mb-3">Бағасы: {{ number_format($course->price, 0, ',', ' ') }} ₸</div>

                        @auth()
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('course_edit', $course->id) }}"
                                   class="inline-block text-white bg-blue-600 hover:bg-blue-700 transition px-4 py-2 rounded-xl text-sm">
                                    Өңдеу
                                </a>
                            @endif
                        @endauth

                        <a href="{{ route('course.learn',$course->id) }}" class="inline-block text-white bg-blue-600 hover:bg-blue-700 transition px-4 py-2 rounded-xl text-sm">
                            Начать обучение
                        </a>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>

@include('layout.footer')
</body>
</html>



