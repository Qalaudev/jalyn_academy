@include('layout.header')

<nav class="bg-white shadow-md p-4 flex justify-between items-center">
    <!-- Логотип -->
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-10 w-10">
        <span class="text-lg font-bold">Онлайн Курсы</span>
    </div>

    <!-- Навигация -->
    <ul class="hidden md:flex space-x-6">
        <li><a href="{{ route('home') }}" class="hover:text-blue-600">Главная</a></li>
        <li><a href="{{ route('navbar') }}" class="hover:text-blue-600">О нас</a></li>
        <li><a href="{{ route('navbar') }}" class="hover:text-blue-600">Курсы</a></li>
        <li><a href="{{ route('navbar') }}" class="hover:text-blue-600">Контакты</a></li>


        <li><a href="{{ route('role_index') }}" class="hover:text-blue-600">Index</a></li>
        <li><a href="{{ route('role_create') }}" class="hover:text-blue-600">Create</a></li>
<<<<<<< HEAD
        {{--        <li><a href="{{ route('role_show') }}" class="hover:text-blue-600">Контакты</a></li>--}}
        {{--        <li><a href="{{ route('role_edit') }}" class="hover:text-blue-600">Edit</a></li>--}}
        {{--        <li><a href="{{ route('role_update') }}" class="hover:text-blue-600">Update</a></li>--}}
        {{--        <li><a href="{{ route('role_delete') }}" class="hover:text-blue-600">Delete</a></li>--}}
=======
{{--        <li><a href="{{ route('role_show') }}" class="hover:text-blue-600">Контакты</a></li>--}}
{{--        <li><a href="{{ route('role_edit') }}" class="hover:text-blue-600">Edit</a></li>--}}
{{--        <li><a href="{{ route('role_update') }}" class="hover:text-blue-600">Update</a></li>--}}
{{--        <li><a href="{{ route('role_delete') }}" class="hover:text-blue-600">Delete</a></li>--}}
>>>>>>> 9f09e9ddc50b7025b58da64617221b4e7c6fbc64


    </ul>

    <!-- Правый угол -->
    <div class="relative">
        @auth
            <div class="flex items-center space-x-3 cursor-pointer" onclick="toggleDropdown()">
                <img src="{{ Auth::user()->avatar ?? asset('images/default-avatar.jpg') }}"
                     alt="User Avatar"
                     class="h-10 w-10 rounded-full border">
                <span class="text-gray-700">{{ Auth::user()->name }}</span>
            </div>

            @if(Auth::user()->role->name == 'Admin')
                <div id="adminDropdown" class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg hidden">
                    <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-gray-200">Админ Панель</a>
                    <a href="{{ route('course_create_form') }}" class="block px-4 py-2 hover:bg-gray-200">Создать курс</a>
                </div>
            @endif
        @else
            <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Войти</a>
        @endauth

    </div>
</nav>

<script>
    function toggleDropdown() {
        let dropdown = document.getElementById('adminDropdown');
        dropdown.classList.toggle('hidden');
    }
</script>
