@include('layout.header')

<div class="container mx-auto px-4 py-6">
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $role->name }}</h1>
        <h2 class="text-xl text-gray-600 mb-4">{{ $role->code }}</h2>
        <p class="text-gray-700 mb-6">
            Бұл рөлдің толық мәліметі. Мұнда сіз рөлге қатысты барлық ақпаратты, сипаттамаларды және қосымша мәліметтерді көрсетуге болады.
        </p>
        <a href="{{ route('role_edit', $role->id) }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Өңдеу
        </a>
    </div>
</div>
