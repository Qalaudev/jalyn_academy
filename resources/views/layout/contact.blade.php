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
                    <p class="mb-2">Электронды пошта: <a href="mailto:info@example.com" class="text-blue-600 hover:underline">info@example.com</a></p>
                    <p class="mb-2">Телефон: <a href="tel:+77001234567" class="text-blue-600 hover:underline">+7 (700) 123-45-67</a></p>
                    <p class="mb-2">WhatsApp: <a href="https://wa.me/77001234567" target="_blank" class="text-blue-600 hover:underline">Жазу</a></p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold mb-4 text-gray-800">📍 Мекен-жай</h2>
                    <p class="mb-2">Қазақстан, Астана қаласы</p>
                    <p class="mb-2">Байтерек көшесі, 12, 3-қабат</p>
                    <p class="text-sm text-gray-500 mt-4">Жұмыс уақыты: Дс–Жм 09:00–18:00</p>
                </div>
            </div>

            <div class="mt-10">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2924.147343763485!2d71.41984641527123!3d51.12820717957314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x424580cf5a0fa059%3A0x55692e7ae6c66f80!2sBaiterek%20Tower!5e0!3m2!1sen!2skz!4v1629641767980!5m2!1sen!2skz"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    class="rounded-xl shadow">
                </iframe>
            </div>
        </div>
    </div>
</main>

@include('layout.footer')
</body>
</html>
