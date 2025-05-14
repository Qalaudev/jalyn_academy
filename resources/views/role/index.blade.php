@include('layout.navbar')

<div class="container mx-auto px-4 py-10">
    {{-- Бет тақырыбы --}}
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">🛡️ Рөлдер тізімі</h1>
        <a href="{{ route('role_create') }}"
           class="bg-green-600 text-white px-5 py-2 rounded-xl hover:bg-green-700 transition duration-200 shadow">
            ➕ Жаңа рөл қосу
        </a>
    </div>

    {{-- Кесте карточка стилінде --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($roles as $role)
            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-md transition duration-300 border border-gray-100">
                <h2 class="text-xl font-semibold text-gray-800 mb-1">{{ $role->name }}</h2>
                <p class="text-sm text-gray-500 mb-4">🔑 Рөл коды: <span class="font-mono">{{ $role->code }}</span></p>

                <div class="flex justify-between items-center text-sm text-gray-700">
                    <a href="{{ route('role_show', $role->id) }}" class="text-blue-600 hover:underline">Қарау</a>
                    <a href="{{ route('role_edit', $role->id) }}" class="text-yellow-600 hover:underline">Өңдеу</a>
                    <form action="{{ route('role_delete', $role->id) }}" method="POST"
                          onsubmit="return confirm('Бұл рөлді өшіргіңіз келетініне сенімдісіз бе?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline bg-transparent border-none p-0">
                            Өшіру
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500 italic">
                Рөлдер табылмады.
            </div>
        @endforelse
    </div>
</div>
