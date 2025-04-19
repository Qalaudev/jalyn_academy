<!DOCTYPE html>
<html lang="kk">
<head>
    @include('layout.header')
</head>
<body>
@include('layout.navbar')
@if(Auth::user()->role->name == 'Admin')
    @include('layout.header')

    @if(Auth::user()->role->name == 'Admin')
        <div class="max-w-4xl mx-auto px-4 py-10">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">📚 Жаңа курс қосу</h1>

            <form action="{{ route('course_create') }}" method="POST"
                  class="bg-white shadow-md rounded-xl p-8 space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Курс атауы</label>
                        <input type="text" name="title" placeholder="Мысалы: Java Developer"
                               class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ұзақтығы (апта)</label>
                        <input type="number" name="duration_weeks" placeholder="24"
                               class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">График</label>
                        <input type="text" name="schedule" placeholder="3 рет, 19:00–21:00"
                               class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Деңгей</label>
                        <input type="text" name="level" placeholder="С нуля"
                               class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Формат</label>
                        <input type="text" name="format" placeholder="Гибрид"
                               class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Басталу күні</label>
                        <input type="date" name="start_date"
                               class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Қалған орын</label>
                        <input type="number" name="spots_left" placeholder="6"
                               class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Бөліп төлеу</label>
                        <input type="text" name="code" id="installmentInput" placeholder="0-0-12"
                               class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500" required>
                        <p id="errorText" class="text-red-500 text-sm mt-1 hidden">Мән 0-0-12 және 0-0-24 арасында болуы керек</p>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Бағасы (₸)</label>
                        <input type="number" name="price" placeholder="690000"
                               class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Сипаттама</label>
                    <textarea name="description" rows="4"
                              placeholder="Бұл курс сізді Junior Java developer деңгейіне дайындайды..."
                              class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                              required></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                        Сақтау
                    </button>
                </div>
            </form>
        </div>
    @endif

@endif
@include('layout.footer')
</body>
<script>
    const input = document.getElementById('installmentInput');
    const errorText = document.getElementById('errorText');

    input.addEventListener('input', () => {
        const value = input.value.trim();
        const match = value.match(/^0-0-(\d{1,2})$/);

        if (match) {
            const num = parseInt(match[1]);
            if (num >= 3 && num <= 24) {
                input.classList.remove('border-red-500');
                errorText.classList.add('hidden');
            } else {
                input.classList.add('border-red-500');
                errorText.classList.remove('hidden');
            }
        } else {
            input.classList.add('border-red-500');
            errorText.classList.remove('hidden');
        }
    });
</script>
