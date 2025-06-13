@include('admin.index')

<h2 class="text-2xl font-bold mb-6 ml-[350px] mr-[100px]">Сұрақты өзгерту</h2>

<div class="relative max-h-[600px] overflow-x-auto overflow-y-auto mt-[20px] ml-[350px] mr-[100px]">
    <form action="{{ route('questions.update', $question->id) }}" method="POST" class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">Бағыт (Training Program):</label>
        <select name="training_program_id" required class="block w-full px-4 py-2 mb-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-300 focus:outline-none focus:border-blue-500 dark:focus:border-blue-500">
            @foreach($trainingPrograms as $trainingProgram)
                <option value="{{ $trainingProgram->id }}" @if($trainingProgram->id == $question->training_program_id) selected @endif>{{ $trainingProgram->name }}</option>
            @endforeach
        </select>

        <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">Сұрақ:</label>
        <input type="text" name="question" value="{{ $question->question }}" class="w-full px-4 py-2 mb-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-300 focus:outline-none focus:border-blue-500 dark:focus:border-blue-500" required>

        <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">Жауаптар:</label>
        @foreach($question->answers as $i => $answer)
            <div class="flex items-center mb-4">
                <input type="checkbox" name="correct_answers[]" value="{{ $i }}" id="answer_correct_{{ $i }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" @if($answer->is_correct) checked @endif>
                <input type="text" name="answers[]" value="{{ $answer->answer }}" placeholder="Жауап {{ $i+1 }}" class="ml-2 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-300 focus:outline-none focus:border-blue-500 dark:focus:border-blue-500" required>
                <label for="answer_correct_{{ $i }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Дұрыс</label>
            </div>
        @endforeach

        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300">Жаңарту</button>
    </form>
</div>
