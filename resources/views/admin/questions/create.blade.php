@include('admin.index')

<h2 class="text-2xl font-bold mb-6 ml-[350px] mr-[100px]">Сұрақ қосу</h2>

<div class="relative max-h-[400px] overflow-x-auto overflow-y-auto mt-[20px] ml-[350px] mr-[100px] mb-8">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-collapse">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th class="px-6 py-3 border">ID</th>
            <th class="px-6 py-3 border">Сұрақ</th>
            <th class="px-6 py-3 border">Бағыт (Training Program)</th>
            <th class="px-6 py-3 border">Әрекет</th>
        </tr>
        </thead>
        <tbody>
        @foreach($questions as $question)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <td class="px-6 py-4 border">{{ $question->id }}</td>
                <td class="px-6 py-4 border">{{ $question->question }}</td>
                <td class="px-6 py-4 border">{{ $question->trainingProgram->name ?? 'N/A' }}</td>
                <td class="px-6 py-4 border">
                    <a href="{{ route('questions.edit', $question->id) }}" class="text-blue-600 hover:text-blue-700">Өзгерту</a>
                    |
                    <form action="{{ route('questions.destroy', $question->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Өшіруге сенімдісің бе?')" class="text-red-600 hover:text-red-700">Өшіру</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="relative max-h-[600px] overflow-x-auto overflow-y-auto mt-[20px] ml-[350px] mr-[100px]">
    <form action="{{ route('questions.store') }}" method="POST" class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        @csrf

        <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">Бағыт (Training Program):</label>
        <select name="training_program_id" required class="block w-full px-4 py-2 mb-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-300 focus:outline-none focus:border-blue-500 dark:focus:border-blue-500">
            @foreach($trainingPrograms as $trainingProgram)
                <option value="{{ $trainingProgram->id }}">{{ $trainingProgram->name }}</option>
            @endforeach
        </select>

        <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">Сұрақ:</label>
        <input type="text" name="question" class="w-full px-4 py-2 mb-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-300 focus:outline-none focus:border-blue-500 dark:focus:border-blue-500" required>

        <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">Жауаптар:</label>
        @for($i = 0; $i < 4; $i++)
            <div class="flex items-center mb-4">
                <input type="checkbox" name="correct_answers[]" value="{{ $i }}" id="answer_correct_{{ $i }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <input type="text" name="answers[]" placeholder="Жауап {{ $i+1 }}" class="ml-2 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-300 focus:outline-none focus:border-blue-500 dark:focus:border-blue-500" required>
                <label for="answer_correct_{{ $i }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Дұрыс</label>
            </div>
        @endfor

        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300">Сақтау</button>
    </form>
</div>
