<!doctype html>
<html lang="en" class="h-full">
<head>
    @include('layout.header')
</head>
<body class="bg-gray-100 h-full flex flex-col">
@include('layout.navbar')

<main class="flex-grow">
    <div class="max-w-5xl mx-auto px-4 py-10 min-h-[calc(100vh-160px)]">
        <div class="bg-white p-8 rounded-3xl shadow-md">
            <div class="mb-10 text-center">
                <h1 class="text-4xl font-extrabold text-gray-800 mb-2 tracking-tight">📞 Байланыс</h1>
                <p class="text-gray-500 text-lg">Бізбен кез келген сұрақ бойынша хабарласыңыз</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-gray-700 text-lg">
                <div>
                    <h2 class="text-2xl font-bold mb-4 text-gray-800">📬 Бізге хат жазыңыз</h2>
                    <p class="mb-2">Электронды пошта: <a href="mailto:info@example.com" class="text-blue-600 hover:underline">jalynacademy@gmail.com</a></p>
                    <p class="mb-2">Телефон: <a href="tel:+77001234567" class="text-blue-600 hover:underline">+7 (747) 474 3456</a></p>
                    <p class="mb-2">WhatsApp: <a href="https://wa.me/77001234567" target="_blank" class="text-blue-600 hover:underline">Жазу</a></p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold mb-4 text-gray-800">📍 Мекен-жай</h2>
                    <p class="mb-2">Қазақстан, Алматы қаласы</p>
                    <p class="mb-2">Жандосов көшесі, 55, 5-қабат</p>
                    <p class="text-sm text-gray-500 mt-4">Жұмыс уақыты: Дс–Жм 09:00–18:00</p>
                </div>
            </div>

            <div class="mt-10">
                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A98748be18bf772f63e245596ca124df49068c93949a18bfe0021f3fbb0c5756a&amp;source=constructor" width="925" height="400" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</main>

@include('layout.footer')
</body>
</html>
