@include('layout.header')

<div class="ml-[350px] mr-[100px] mt-[20px] bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700">
    <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Нәтиже</h2>
    <p class="text-lg text-gray-700 dark:text-gray-300">Сіз {{ $score }} / {{ $total }} дұрыс жауап бердіңіз.</p>

    {{-- Кнопка "Артқа" на страницу курса --}}
    <a href="{{ route('course.learn', ['id' => $course_id]) }}" class="text-blue-500 hover:underline">Артқа</a>
</div>
