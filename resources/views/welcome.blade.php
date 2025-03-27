<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Басты бет</title>
    <style>
        .hidden { display: none; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

{{-- Навбар --}}
@include('layout.header')

<nav class="bg-white shadow-md p-4 flex justify-between items-center">
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-10 w-10">
        <span class="text-lg font-bold">Онлайн Курсы</span>
    </div>

    {{-- Бургер-меню для мобильных --}}
    <button id="burger" class="md:hidden text-gray-700 focus:outline-none">
        ☰
    </button>

    <ul id="nav-menu" class="hidden md:flex space-x-6">
        <li><a href="{{ route('home') }}" class="hover:text-blue-600">Главная</a></li>
        <li><a href="{{ route('navbar') }}" class="hover:text-blue-600">О нас</a></li>
        <li><a href="{{ route('navbar') }}" class="hover:text-blue-600">Курсы</a></li>
        <li><a href="{{ route('navbar') }}" class="hover:text-blue-600">Контакты</a></li>
        <li><a href="{{ route('role_index') }}" class="hover:text-blue-600">Index</a></li>
        <li><a href="{{ route('role_create') }}" class="hover:text-blue-600">Create</a></li>
    </ul>

    <div class="relative mb-3 col-end-1">
        @auth
            <div class="flex items-center space-x-3 cursor-pointer" onclick="toggleDropdown()">
                <img src="{{ Auth::user()->avatar ?? asset('images/default-avatar.jpg') }}" alt="User Avatar" class="h-10 w-10 rounded-full border">
                <span class="text-gray-700">{{ Auth::user()->name }}</span>
            </div>
            @if(Auth::user()->role->name == 'Admin')
                <div id="adminDropdown" class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg hidden">
                    <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-gray-200">Админ Панель</a>
{{--                    <a href="{{ route('course_create_form') }}" class="block px-4 py-2 hover:bg-gray-200">Создать курс</a>--}}
                </div>
            @endif
        @else
            <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Войти</a>
        @endauth
    </div>
</nav>

{{-- Контент страницы --}}
<div class="flex flex-col justify-center items-center text-center flex-grow px-4">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Online Platform: <span class="text-blue-600">Jalyn</span></h2>
        <div class="flex flex-col space-y-3">
            <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md w-full text-center">Кіру </a>
            <a href="{{ route('register') }}" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md w-full text-center">Тіркелу </a>
        </div>
    </div>
</div>

{{-- Скрипты --}}
<script>
    function toggleDropdown() {
        document.getElementById('adminDropdown').classList.toggle('hidden');
    }

    document.getElementById('burger').addEventListener('click', function () {
        document.getElementById('nav-menu').classList.toggle('hidden');
    });
</script>

</body>
</html>
