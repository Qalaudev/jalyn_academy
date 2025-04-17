@include('layout.header')

<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6">Курстар тізімі</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('course_create_form') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Курс қосу</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($courses as $course)
            <div class="p-4 border rounded mb-2">
                <h2 class="font-bold">{{ $course->title }}</h2>
                <p>{{ $course->description }}</p>
                <p><strong>Бағасы:</strong> {{ $course->price }} ₸</p>
                <a href="{{ route('courses.edit', $course->id) }}" class="text-blue-500">Өңдеу</a>
            </div>
        @endforeach
    </div>
</div>
