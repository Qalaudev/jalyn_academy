@include('layout.navbar')
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6">Менің сертификаттарым</h1>

    @if($certificates->isEmpty())
        <p class="text-gray-600">Сізде әлі сертификаттар жоқ.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($certificates as $certificate)
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-semibold mb-2">{{ $certificate->course->title }}</h2>
                    <p class="text-gray-600 mb-2">Сертификат №: {{ $certificate->certificate_number }}</p>
                    <p class="text-gray-600 mb-2">Шығарылған күні: {{ $certificate->issue_date->format('d.m.Y') }}</p>
                    <a href="{{ route('certificates.show', $certificate->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg mt-4">
                        Көру
                    </a>
                    <a href="{{ route('certificates.download', $certificate->id) }}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg mt-4 ml-2">
                        Жүктеу (PDF)
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
