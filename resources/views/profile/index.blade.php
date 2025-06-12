<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <title>Пайдаланушы профилі</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

{{-- Басты бетке оралу сілтемесі --}}
<div class="mb-6 text-sm text-blue-600">
    <a href="{{ route('home') }}" class="hover:underline">← Басты бетке оралу</a>
</div>

<div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <div class="flex flex-col lg:flex-row gap-6">
        {{-- Сол жақ блок --}}
        <div class="w-full lg:w-1/3 bg-white p-4 rounded-lg shadow">
            <div class="text-center">
                <img src="{{ Auth::user()->avatar ?? asset('images/default-avatar.jpg') }}"
                     class="w-32 h-32 mx-auto rounded-full border">
                <h2 class="text-xl font-semibold mt-4">{{ $user->name }}</h2>
                <p class="text-gray-600">Full Stack Developer</p>
                <p class="text-gray-400">Қазақстан, Алматы</p>
                <div class="mt-4 flex justify-center space-x-2">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Бақылау</button>
                    <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">Хабарласу</button>
                </div>
            </div>

            <div class="mt-6">
                <ul class="text-sm text-gray-700 space-y-2">
                    <li class="flex justify-between"><span>🌐 Website:</span> <a href="#" class="text-blue-600">jalyn.kz</a></li>
                    <li class="flex justify-between"><span>🐱 Github:</span> <span>jalyn</span></li>
                    <li class="flex justify-between"><span>🐦 Twitter:</span> <span>@jalyn</span></li>
                    <li class="flex justify-between"><span>📸 Instagram:</span> <span>@jalyn.dev</span></li>
                    <li class="flex justify-between"><span>📘 Facebook:</span> <span>jalyn</span></li>
                </ul>
            </div>
        </div>

        {{-- Оң жақ блок --}}
        <div class="w-full lg:w-2/3 space-y-6">
            {{-- Жеке ақпарат --}}
            <div class="bg-gray-50 p-4 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-4">Жеке ақпарат</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-800">
                    <p><strong>Аты-жөні:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Телефон:</strong> +7 (777) 123-4567</p>
                    <p><strong>Мобильді:</strong> +7 (707) 123-4567</p>
                    <p class="md:col-span-2"><strong>Мекен-жай:</strong> Алматы, Қазақстан</p>
                    <p class="md:col-span-2"><strong>Тіркелген күні:</strong> {{ $user->created_at->format('d.m.Y H:i') }}</p>
                </div>
            </div>

            {{-- Тапсырма статусы --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @for($i = 0; $i < 2; $i++)
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h4 class="text-sm text-blue-600 font-semibold mb-2">Тапсырма статусы</h4>
                        <div class="space-y-3 text-sm">
                            @php
                                $tasks = ['Python негіздері', 'Java практикасы', 'HTML + CSS', 'Laravel жобасы', 'Vue компоненттері'];
                                $progress = [90, 75, 60, 40, 20];
                            @endphp
                            @foreach($tasks as $index => $task)
                                <div>
                                    <span class="block text-gray-700">{{ $task }}</span>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-blue-500 h-2 rounded-full" style="width: {{ $progress[$index] }}%;"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>

</body>
</html>
