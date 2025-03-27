@include('layout.header')

<nav class="bg-white shadow-md p-4 flex justify-between items-center">
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logoo.png') }}" alt="Logo" class="w-28 h-auto">
        <span class="text-lg font-bold">Онлайн Курсы</span>
    </div>

    <ul class="hidden md:flex space-x-6">
        <li><a href="{{ route('home') }}" class="hover:text-blue-600">Главная</a></li>
        <li><a href="{{ route('navbar') }}" class="hover:text-blue-600">О нас</a></li>
        <li><a href="{{ route('course_index') }}" class="hover:text-blue-600">Курсы</a></li>
        <li><a href="{{ route('role_index') }}" class="hover:text-blue-600">Index</a></li>
        <li><a href="{{ route('role_create') }}" class="hover:text-blue-600">Create</a></li>
    </ul>

    <div class="relative">
        @auth
            <div class="flex items-center space-x-3 cursor-pointer" onclick="toggleDropdown()">
                <img src="{{ Auth::user()->avatar ?? asset('images/default-avatar.jpg') }}"
                     alt="User Avatar"
                     class="h-10 w-10 rounded-full border cursor-pointer">
                <span class="text-gray-700">{{ Auth::user()->name }}</span>
            </div>

            @if(Auth::user()->role->name == 'Admin')
                <div id="adminDropdown" class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg hidden transition-all duration-200">
                    <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-gray-200">Админ Панель</a>
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
        dropdown.classList.toggle('hidden');
    }
</script>
