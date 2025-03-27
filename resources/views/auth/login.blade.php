<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Кіру</title>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
<div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Кіру</h2>
    <form action="{{ route('authenticate') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="email" class="block text-gray-700 font-medium">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" required
                   class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label for="password" class="block text-gray-700 font-medium">Пароль</label>
            <input type="password" id="password" name="password" placeholder="Пароль" required
                   class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <button type="submit"
                class="w-full bg-blue-500 text-white p-3 rounded-lg font-semibold hover:bg-blue-600 transition">Кіру</button>
    </form>
    <p class="text-center text-gray-600 mt-4">Тіркелгіңіз жоқ па? <a href="{{route('register')}}" class="text-blue-500 font-semibold">Тіркелу</a></p>
</div>
</body>
</html>
