@include('layout.header')
<div class="container mx-auto px-4 py-6">
    @include('layout.header')

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Рөлдер тізімі</h1>
        <a href="{{ route('role_create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Жаңа рөл қосу
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left text-gray-600 font-medium border-b">Аты</th>
                <th class="px-4 py-2 text-left text-gray-600 font-medium border-b">Коды</th>
                <th class="px-4 py-2 text-left text-gray-600 font-medium border-b">Әрекеттер</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($roles as $role)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ $role->name }}</td>
                    <td class="px-4 py-2 border-b">{{ $role->code }}</td>
                    <td class="px-4 py-2 border-b">
                        <div class="flex space-x-2">
                            <a href="{{ route('role_show', $role->id) }}" class="text-blue-600 hover:underline">
                                Көру
                            </a>
                            <a href="{{ route('role_edit', $role->id) }}" class="text-green-600 hover:underline">
                                Өңдеу
                            </a>
                            <form action="{{ route('role_delete', $role->id) }}" method="POST" onsubmit="return confirm('Бұл рөлді өшіргіңіз келетініне сенімдісіз бе?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">
                                    Өшіру
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
