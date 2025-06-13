@include('admin.index')

<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold mb-6">Список программ обучения</h1>

    <a href="{{ route('training_programs.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 mb-4">
        Добавить новую программу обучения
    </a>

    <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative" style="height: 400px;">
        <table class="w-full whitespace-no-wrap relative">
            <thead>
                <tr class="text-left font-bold bg-gray-50 text-gray-600 sticky top-0">
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Название</th>
                    <th class="px-6 py-3">Курс</th>
                    <th class="px-6 py-3">Задачи</th>
                    <th class="px-6 py-3">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trainingPrograms as $program)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-6 py-4">{{ $program->id }}</td>
                        <td class="px-6 py-4">{{ $program->name }}</td>
                        <td class="px-6 py-4">{{ $program->course->title ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ Str::limit($program->task, 100) }}</td>
                        <td class="px-6 py-4 flex items-center space-x-2">
                            <a href="{{ route('training_programs.edit', $program->id) }}" class="text-blue-600 hover:text-blue-900">Изменить</a>
                            <form action="{{ route('training_programs.destroy', $program->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить эту программу обучения?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
