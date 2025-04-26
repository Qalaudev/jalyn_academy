@include('admin.index')
<div class="relative max-h-[400px] overflow-x-auto overflow-y-auto mt-[20px] ml-[350px] mr-[100px]">
    <h1 class="text-2xl font-semibold mb-4">{{ $user->name }} - Курстарға қолжетімділік</h1>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">Аты</th>
            <th scope="col" class="px-6 py-3">Рөлі</th>
            <th scope="col" class="px-6 py-3">Қай курсқа доступтары бар</th>
        </tr>
        </thead>
        <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4">{{ $user->name }}</td>
            <td class="px-6 py-4">{{ $user->role->name }}</td>
            <td class="px-6 py-4">
                <ul>
                    @foreach($courses as $course)
                        <li>{{ $course->title }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        </tbody>
    </table>
</div>
