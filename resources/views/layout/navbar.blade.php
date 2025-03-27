@include('layout.header')

<nav class="bg-white shadow-md p-4 flex justify-between items-center fixed top-0 left-0 w-full z-50">
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logoo.png') }}" alt="Logo" class="w-28 h-auto">
        <span class="text-lg font-bold">Онлайн Курсы</span>
    </div>

    <ul class="hidden md:flex space-x-6">
        <li><a href="{{ route('home') }}" class="hover:text-blue-600">Басты Бет</a></li>
        <li><a href="{{ route('about') }}" class="hover:text-blue-600">Біз туралы</a></li>
        <li><a href="{{ route('course_index') }}" class="hover:text-blue-600">Курстар</a></li>
    </ul>

    <div class="relative">
        @auth
            <div class="flex items-center space-x-3 cursor-pointer" onclick="toggleDropdown()">
                <img src="{{ Auth::user()->avatar ?? asset('images/default-avatar.jpg') }}"
                     alt="User Avatar"
                     class="h-10 w-10 rounded-full border cursor-pointer">
                <span class="text-gray-700">{{ Auth::user()->name }}</span>
            </div>

            @if(Auth::user() && isset(Auth::user()->role) && Auth::user()->role->name == 'Admin')
                <div id="adminDropdown" class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg hidden">
                    <a href="{{ route('course_create_form') }}" class="block px-4 py-2 hover:bg-gray-200">Создать курс</a>
                </div>
            @endif
        @else
            <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all">Войти</a>
        @endauth
    </div>
</nav>

<script>
    function toggleDropdown() {
        let dropdown = document.getElementById('adminDropdown');
        if (dropdown) {
            dropdown.classList.toggle('hidden');
        }
    }
</script>
