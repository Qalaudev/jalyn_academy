@include('layout.header')
@include('layout.navbar')

<div class="flex items-start min-h-[60vh] bg-gray-50 px-8 pt-12 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-indigo-100 opacity-20 transform -skew-y-3 scale-150"></div>
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-xl mx-auto z-10">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6 border-b pb-4 flex items-center gap-3">
            <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 10a4 4 0 100-8 4 4 0 000 8zm-7 8a7 7 0 0114 0H3z"/>
            </svg>
            Құпия сөзді өзгерту
        </h2>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-md" role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profile.update_password') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="current_password" class="block text-sm font-medium text-gray-800 mb-1">Қазіргі құпия сөз</label>
                <input type="password" name="current_password" id="current_password" required
                       class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm placeholder-gray-400">
            </div>

            <div>
                <label for="new_password" class="block text-sm font-medium text-gray-800 mb-1">Жаңа құпия сөз</label>
                <input type="password" name="new_password" id="new_password" required
                       class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm placeholder-gray-400">
            </div>

            <div>
                <label for="new_password_confirmation" class="block text-sm font-medium text-gray-800 mb-1">Жаңа құпия сөзді растаңыз</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" required
                       class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm placeholder-gray-400">
            </div>

            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <button type="submit"
                        class="flex-grow inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    Құпия сөзді өзгерту
                </button>
                <a href="{{ route('profile') }}" class="flex-grow inline-flex items-center justify-center py-3 px-6 border border-gray-300 text-base font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                    ← Артқа
                </a>
            </div>
        </form>
    </div>
</div>
