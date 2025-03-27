@include('layout.header')
@include('layout.navbar')
    <!DOCTYPE html>
<html lang="kk">
<head>

</head>
<body>

<div class="container mx-auto px-4 py-6">
    <div class="mb-4 text-center">
        <h1 class="text-4xl font-bold text-center mb-8">О нас</h1>
        <p class="text-lg text-gray-700 text-center max-w-2xl mx-auto">
             <span class="font-semibold text-blue-600">Jalyn</span> Платформасына қош келдіңіз! Біз барлық жаңадан бастаушыларға Заманауи бағдарламалау курстарын ұсынамыз

        <div class="grid md:grid-cols-2 gap-10 mt-12">
            <div class="p-6 bg-white shadow-md rounded-lg transition duration-300 hover:shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">Біздің миссиямыз</h2>
                <p class="text-gray-600 leading-relaxed">
                    Біз IT саласындағы сапалы білім барлығына қолжетімді болуы керек деп санаймыз. Біздің мақсатымыз-заманауи технологияларды игеруге  көмектесу.
                </p>
            </div>

            <div class="p-6 bg-white shadow-md rounded-lg transition duration-300 hover:shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">Неліктен бізді таңдайды ?</h2>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-center">
                        <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Тәжірибелі мамандардың сапалы курстары бар                   </li>
{{--                    <li class="flex items-center">--}}
{{--                        <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>--}}
{{--                        </svg>--}}
{{--                        Сертификаты после успешного прохождения--}}
{{--                    </li>--}}
                </ul>
            </div>
        </div>
    </div>
</div>

</body>
</html>
