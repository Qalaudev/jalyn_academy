@include('layout.navbar')

@if(Auth::user()->role->name == 'Admin')
    <div class="container mx-auto px-4 py-10">
        <div class="max-w-xl mx-auto bg-white shadow-lg rounded-2xl p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">🛠️ Рөлді өңдеу</h1>

            <form action="{{ route('role_update', $role->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('POST')

                {{-- Рөл атауы --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Рөл атауы</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ $role->name }}"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Мысалы: Мұғалім, Әкімші"
                    >
                </div>

                {{-- Код --}}
                <div>
                    <label for="code" class="block text-sm font-medium text-gray-700 mb-1">Рөл коды</label>
                    <input
                        type="text"
                        name="code"
                        id="code"
                        value="{{ $role->code }}"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Мысалы: teacher, admin"
                    >
                </div>

                {{-- Батырма --}}
                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-xl transition duration-200">
                        💾 Өзгерістерді сақтау
                    </button>
                </div>
            </form>
        </div>
    </div>
@endif
