<!DOCTYPE html>
<html lang="kk">
<head>
    @include('layout.header')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
@include('layout.navbar')
<div class="bg-white p-8 rounded shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold mb-4">Профиль</h2>
    <div class="space-y-2">
        <p><strong>Аты:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Тіркелген күні:</strong> {{ $user->created_at->format('d.m.Y H:i') }}</p>
    </div>
    <a href="{{ route('home') }}" class="mt-6 inline-block text-blue-500 hover:underline">← Басты бетке оралу</a>
</div>
</body>
</html>
