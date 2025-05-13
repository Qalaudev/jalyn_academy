@include('admin.index')

<h2 class="text-2xl font-bold mb-6 ml-[350px] mr-[100px]">Сұрақ қосу</h2>

<div class="relative max-h-[600px] overflow-x-auto overflow-y-auto mt-[20px] ml-[350px] mr-[100px]">
    <form action="{{ route('questions.store') }}" method="POST" class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        @csrf

        <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">Бағыт (Menu):</label>
        <select name="menu_id" required class="block w-full px-4 py-2 mb-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-300 focus:outline-none focus:border-blue-500 dark:focus:border-blue-500">
            @foreach($menus as $menu)
                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
            @endforeach
        </select>

        <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">Сұрақ:</label>
        <input type="text" name="question" class="w-full px-4 py-2 mb-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-300 focus:outline-none focus:border-blue-500 dark:focus:border-blue-500" required>

        <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">Жауаптар:</label>
        @for($i = 0; $i < 4; $i++)
            <input type="text" name="answers[]" placeholder="Жауап {{ $i+1 }}" class="w-full px-4 py-2 mb-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-300 focus:outline-none focus:border-blue-500 dark:focus:border-blue-500" required>
        @endfor

        <label class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">Дұрыс жауап индексі (0-3):</label>
        <input type="number" name="correct" min="0" max="3" class="w-full px-4 py-2 mb-6 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-300 focus:outline-none focus:border-blue-500 dark:focus:border-blue-500" required>

        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300">Сақтау</button>
    </form>
</div>
