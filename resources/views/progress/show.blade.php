@include('layout.navbar')
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6">Курс прогрессі: {{ $course->title }}</h1>

    @if($progress)
        <div class="bg-white rounded-lg shadow-lg p-8">
            <p class="text-lg mb-4">Орындалған сабақтар: <span class="font-semibold">{{ $progress->completed_lessons }} / {{ $progress->total_lessons }}</span></p>
            <p class="text-lg mb-4">Прогресс: <span class="font-semibold">{{ round($progress->progress_percentage, 0) }}%</span></p>
            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $progress->progress_percentage }}%"></div>
            </div>

            @if($progress->is_completed)
                <p class="text-green-600 font-semibold mb-4">Курс аяқталды! Сіз сертификат алуға дайынсыз.</p>
                <a href="{{ route('certificates.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg mt-4">
                    Сертификаттарды қарау
                </a>
            @else
                <p class="text-orange-500 font-semibold mb-4">Курс орындалуда...</p>
            @endif

            <div class="mt-8">
                <a href="{{ route('progress.index') }}" class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">
                    Артқа
                </a>
            </div>
        </div>
    @else
        <p class="text-gray-600">Бұл курс бойынша прогресс табылған жоқ.</p>
    @endif
</div>
