<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Jalyn - бағдарламалау курстарын үйрену платформасы. Жаңадан бастаушылар мен тәжірибелі мамандарға арналған курстар.">
    <title>Jalyn - Бағдарламалау курстары</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
@include('layout.header')
@include('layout.navbar')

<div class="relative bg-cover bg-center h-screen" style="background-image: url('{{ asset('images/banner.png') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center px-4">
        <h1 class="text-5xl font-bold text-white mb-6">Қош келдіңіз, Jalyn платформасына!</h1>
        <p class="text-lg text-gray-200 mb-8 max-w-2xl">
            Бұл жерде сіз бағдарламалау курстарын тауып, үйрене аласыз. Біздің курстар
            жаңа бастаушылардан бастап тәжірибелі мамандарға дейін арналған.
        </p>
        <a href="/courses" class="bg-blue-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-blue-800 transition-all">Курстарды қарау</a>
    </div>
</div>

<div class="container mx-auto px-4 py-10 text-center">
    <h2 class="text-3xl font-bold mb-6">Бізді әлеуметтік желілерде табыңыз</h2>
    <div class="flex justify-center space-x-6">
        <a href="https://facebook.com/jalyn" class="text-blue-600 text-3xl hover:text-blue-800 transition-all duration-300">
            <i class="fab fa-facebook"></i>
        </a>
        <a href="https://twitter.com/jalyn" class="text-blue-400 text-3xl hover:text-blue-600 transition-all duration-300">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="https://instagram.com/jalyn" class="text-pink-600 text-3xl hover:text-pink-800 transition-all duration-300">
            <i class="fab fa-instagram"></i>
        </a>
    </div>
</div>
<div class="container mx-auto px-4 py-10">
    <h2 class="text-3xl font-bold text-center mb-6">Пайдаланушылардың пікірлері</h2>
    <div class="space-y-6 max-w-3xl mx-auto">
        <div class="bg-white shadow-md rounded-lg p-6">
            <p class="text-gray-700 italic">"Jalyn платформасы маған бағдарламалауды үйренуге көмектесті! Материалдар өте түсінікті, ал оқыту жүйесі ыңғайлы. Курс аяқталған соң сертификат алдым, бұл менің мансабыма үлкен көмек болды. Рақмет сіздерге!"</p>
            <p class="text-gray-900 font-semibold mt-2">- Аружан К.</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6">
            <p class="text-gray-700 italic">"Керемет платформа! Курстар сапалы, ал оқытушылар өте тәжірибелі. Практикалық тапсырмалар арқылы білімімді жетілдірдім. Ұсынамын!"</p>
            <p class="text-gray-900 font-semibold mt-2">- Ержан Т.</p>
        </div>
    </div>
</div>
<div class="container mx-auto px-4 py-10">
    <h2 class="text-3xl font-bold text-center mb-6">Жиі қойылатын сұрақтар</h2>
    <div class="space-y-4 max-w-3xl mx-auto">
        <details class="bg-white shadow-md rounded-lg p-4 cursor-pointer">
            <summary class="font-semibold">Курстарға қалай тіркелуге болады?</summary>
            <p class="text-gray-600 mt-2">Курстарға тіркелу үшін аккаунт ашып, өзіңізге ұнаған курсты таңдауыңыз керек.</p>
        </details>
        <details class="bg-white shadow-md rounded-lg p-4 cursor-pointer">
            <summary class="font-semibold">Курстардың бағасы қандай?</summary>
            <p class="text-gray-600 mt-2">Әр курс әртүрлі бағада. Кейбір курстар тегін, ал кейбіреулері ақылы.</p>
        </details>
        <details class="bg-white shadow-md rounded-lg p-4 cursor-pointer">
            <summary class="font-semibold">Сертификат ала аламын ба?</summary>
            <p class="text-gray-600 mt-2">Иә, курсты сәтті аяқтағаннан кейін сертификат беріледі.</p>
        </details>
    </div>
</div>
</body>
</html>
