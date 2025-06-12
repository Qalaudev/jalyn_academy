@include('layout.navbar')
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6">Сертификатты тексеру</h1>

    @isset($certificate)
        <div class="bg-white rounded-lg shadow-lg p-8">
            <p class="text-lg mb-4">Сертификат №: <span class="font-semibold">{{ $certificate->certificate_number }}</span></p>
            <p class="text-lg mb-4">Курс: <span class="font-semibold">{{ $certificate->course->title }}</span></p>
            <p class="text-lg mb-4">Пайдаланушы: <span class="font-semibold">{{ $certificate->user->name }}</span></p>
            <p class="text-lg mb-4">Шығарылған күні: <span class="font-semibold">{{ $certificate->issue_date->format('d.m.Y') }}</span></p>
            <p class="text-lg mb-4">Статус: <span class="font-semibold text-green-600">{{ $certificate->status }}</span></p>

            @if($certificate->certificate_data)
                <div class="mt-6">
                    <h2 class="text-2xl font-semibold mb-4">Сертификат деректері:</h2>
                    @foreach($certificate->certificate_data as $key => $value)
                        <p class="text-gray-700"><span class="font-medium">{{ ucfirst(str_replace('_', ' ', $key)) }}:</span> {{ $value }}</p>
                    @endforeach
                </div>
            @endif
        </div>
    @else
        <p class="text-gray-600">Сертификат табылған жоқ немесе жарамсыз.</p>
    @endisset
</div>
