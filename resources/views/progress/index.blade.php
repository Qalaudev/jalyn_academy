@include('layout.navbar')
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6">Менің прогрессім</h1>

    @if($progress->isEmpty())
        <p class="text-gray-600">Сізде әлі курс прогрессі жоқ.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($progress as $item)
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-semibold mb-2">{{ $item->course->title }}</h2>
                    <p class="text-gray-600 mb-2">Орындалған сабақтар: {{ $item->completed_lessons }} / {{ $item->total_lessons }}</p>
                    <p class="text-gray-600 mb-2">Прогресс: {{ round($item->progress_percentage, 0) }}%</p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $item->progress_percentage }}%"></div>
                    </div>
                    @if($item->is_completed)
                        <p class="text-green-600 font-semibold">Курс аяқталды!</p>
                    @else
                        <p class="text-orange-500 font-semibold">Курс орындалуда...</p>
                    @endif
                    <a href="{{ route('progress.show', $item->course->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg mt-4">
                        Толығырақ
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
