@include('layout.header')

<h2 class="text-2xl font-bold mb-6 ml-[350px] mr-[100px]">{{ $trainingProgram->name }} – Тест</h2>
<form method="POST" action="{{ route('test.submit', $trainingProgram->id) }}" class="ml-[350px] mr-[100px]">
    @csrf

    @foreach($questions as $question)
        <div class="mb-6 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700">
            <p class="font-semibold text-lg text-gray-900 dark:text-white mb-3">{{ $loop->iteration }}. {{ $question->question }}</p>
            @foreach($question->answers as $answer)
                <label class="flex items-center mb-2">
                    <input type="checkbox" name="question_{{ $question->id }}[]" value="{{ $answer->id }}" class="mr-3 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                    <span class="text-gray-800 dark:text-gray-300">{{ $answer->answer }}</span>
                </label>
            @endforeach
        </div>
    @endforeach

    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition-all duration-300">Тапсыру</button>
</form>
