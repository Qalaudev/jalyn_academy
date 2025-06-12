@include('layout.navbar')
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6">Сертификат</h1>

    <div class="bg-white rounded-lg shadow-lg p-8">
        <p class="text-lg mb-4">Курс: <span class="font-semibold">{{ $certificate->course->title }}</span></p>
        <p class="text-lg mb-4">Пользователь: <span class="font-semibold">{{ $certificate->user->name }}</span></p>
        <p class="text-lg mb-4">Сертификат №: <span class="font-semibold">{{ $certificate->certificate_number }}</span></p>
        <p class="text-lg mb-4">Шығарылған күні: <span class="font-semibold">{{ $certificate->issue_date->format('d.m.Y') }}</span></p>
        <p class="text-lg mb-4">Статус: <span class="font-semibold">{{ $certificate->status }}</span></p>

        @if($certificate->certificate_data)
            <div class="mt-6">
                <h2 class="text-2xl font-semibold mb-4">Детали сертификата:</h2>
                @foreach($certificate->certificate_data as $key => $value)
                    <p class="text-gray-700"><span class="font-medium">{{ ucfirst(str_replace('_', ' ', $key)) }}:</span> {{ $value }}</p>
                @endforeach
            </div>
        @endif

        <div class="mt-8">
            <a href="{{ route('certificates.download', $certificate->id) }}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg mr-4">
                Жүктеу (PDF)
            </a>
            <a href="{{ route('certificates.index') }}" class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">
                Артқа
            </a>
        </div>
    </div>
</div>
