@include('layout.header')

<nav class="bg-white shadow-md py-4">
    <div class="container mx-auto px-4 flex items-center justify-between">
        {{-- Логотип + Мәзірлер --}}
        <div class="flex items-center space-x-8">
            {{-- Логотип --}}
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/jalyn_logo.jpg') }}" alt="Logo" class="h-10 w-10 rounded-full object-cover">
                    <span class="text-lg font-bold text-gray-800">Jalyn</span>
                </a>
            </div>

            {{-- Мәзірлер --}}
            <ul class="hidden md:flex space-x-6 font-semibold">
                <li><a href="{{ route('home') }}" class="hover:text-blue-600">Басты бет</a></li>
                <li><a href="{{ route('about_us') }}" class="hover:text-blue-600">Біз туралы</a></li>
                <li><a href="{{ route('course_index') }}" class="hover:text-blue-600">Курстар</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-blue-600">Контакты</a></li>

                @if(Auth::user()?->role?->name === 'Admin')
                    <li><a href="{{ route('role_index') }}" class="hover:text-blue-600">Рольдер</a></li>
                    <li><a href="{{ route('role_create') }}" class="hover:text-blue-600">Рольдер құру</a></li>
                @endif
            </ul>
        </div>

        {{-- Пайдаланушы батырмалары --}}
        <div class="relative flex items-center space-x-4">
            @auth
                <div class="relative inline-block text-left">
                    <div onclick="toggleDropdown()" class="flex items-center space-x-3 cursor-pointer">
                        <img src="{{ Auth::user()->avatar ?? asset('images/default-avatar.jpg') }}"
                             alt="User Avatar"
                             class="h-10 w-10 rounded-full border">
                        <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    </div>
                    <div id="adminDropdown"
                         class="absolute right-0 top-full mt-2 w-48 bg-white border rounded-lg shadow-lg hidden z-50">
                        @if(Auth::user()?->role?->name === 'Admin')
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-200">Админ Панель</a>
                            <a href="{{ route('course_create_form') }}" class="block px-4 py-2 hover:bg-gray-200">Создать курс</a>
                        @endif

                        <a href="{{ route('certificates.index') }}" class="block px-4 py-2 hover:bg-gray-200">Менің сертификаттарым</a>

                        {{-- ✅ Жаңа сілтеме: Профиль --}}
                        <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-200">Менің профилім</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left block px-4 py-2 hover:bg-gray-200">Выйти</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Войти</a>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">Регистрация</a>
            @endauth
        </div>
    </div>
</nav>

{{-- Dropdown toggle --}}
<script>
    function toggleDropdown() {
        let dropdown = document.getElementById('adminDropdown');
        dropdown.classList.toggle('hidden');
    }

    document.addEventListener('click', function (event) {
        const dropdown = document.getElementById('adminDropdown');
        const trigger = dropdown?.previousElementSibling;

        if (dropdown && !dropdown.contains(event.target) && !trigger.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>
