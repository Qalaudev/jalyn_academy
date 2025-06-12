@include('layout.header')
@include('layout.navbar')

<div class="flex items-start min-h-[60vh] bg-gray-50 px-8 pt-16 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-indigo-100 opacity-20 transform -skew-y-3 scale-150"></div>
    <div class="bg-white p-12 rounded-2xl shadow-2xl w-full max-w-xl mx-auto z-10 animate-fade-in">
        <h2 class="text-4xl font-extrabold text-gray-800 mb-10 border-b pb-6 flex items-center gap-4">
            <svg class="w-9 h-9 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 10a4 4 0 100-8 4 4 0 000 8zm-7 8a7 7 0 0114 0H3z"/>
            </svg>
            Профиль
        </h2>
        <div class="space-y-8 text-gray-700 text-xl leading-relaxed">
            <div class="flex items-center">
                <span class="font-semibold text-gray-900 w-40">Аты:</span>
                <span class="ml-4 text-gray-800">{{ $user->name }}</span>
            </div>
            <div class="flex items-center">
                <span class="font-semibold text-gray-900 w-40">Email:</span>
                <span class="ml-4 text-gray-800">{{ $user->email }}</span>
            </div>
            <div class="flex items-center">
                <span class="font-semibold text-gray-900 w-40">Тіркелген күні:</span>
                <span class="ml-4 text-gray-800">{{ $user->created_at->format('d.m.Y H:i') }}</span>
            </div>
        </div>

        <div class="mt-16 flex flex-col sm:flex-row gap-5">
            <a href="{{ route('profile.change_password') }}" class="flex-grow inline-flex items-center justify-center px-8 py-4 border border-transparent text-lg font-medium rounded-lg shadow-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:scale-105">
                Өзгерту құпия сөзді
            </a>
            <a href="{{ route('home') }}" class="flex-grow inline-flex items-center justify-center px-8 py-4 border border-gray-300 text-lg font-medium rounded-lg shadow-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 transform hover:scale-105">
                ← Басты бетке оралу
            </a>
        </div>
    </div>
</div>
