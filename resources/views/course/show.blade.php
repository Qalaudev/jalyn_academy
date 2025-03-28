@include('layout.header')

<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6">{{ $course->title }}</h1>
    <div class="bg-white shadow-md rounded p-6">
        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="w-full h-48 object-cover rounded mb-4">
        <p class="text-gray-700">{{ $course->description }}</p>
        <p class="text-gray-800 font-bold mt-4">Бағасы: {{ $course->price }} ₸</p>
        @if(Auth::user()->role->name == 'Admin')
        <div class="mt-6">
            <a href="{{ route('course_edit', $course->id) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white py-2 px-4 rounded">Өңдеу</a>
        @endif
            <a href="{{ route('course_index') }}" class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded">Тізімге қайту</a>
        </div>
    </div>
</div>
