@include('admin.index')

<h2 class="text-2xl font-bold mb-6 ml-[350px] mr-[100px]">Тест сұрақтары</h2>

<a href="{{ route('questions.create') }}" class="bg-green-600 text-white px-4 py-2 rounded mb-6 inline-block hover:bg-green-700 transition-all duration-300">+ Сұрақ қосу</a>

@if(session('success'))
    <p class="text-green-700 dark:text-green-400 mb-4">{{ session('success') }}</p>
@endif

<div class="relative max-h-[400px] overflow-x-auto overflow-y-auto mt-[20px] ml-[350px] mr-[100px]">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-collapse">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th class="px-6 py-3 border">ID</th>
            <th class="px-6 py-3 border">Сұрақ</th>
            <th class="px-6 py-3 border">Әрекет</th>
        </tr>
        </thead>
        <tbody>
        @foreach($questions as $question)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <td class="px-6 py-4 border">{{ $question->id }}</td>
                <td class="px-6 py-4 border">{{ $question->question }}</td>
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
