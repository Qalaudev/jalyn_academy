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
            <div class="bg-white shadow-md rounded p-4">
                <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="w-full h-48 object-cover rounded">
                <h2 class="text-xl font-semibold mt-4">{{ $course->title }}</h2>
                <p class="text-gray-700 mt-2">{{ Str::limit($course->description, 100) }}</p>
                <p class="text-gray-800 font-bold mt-2">Бағасы: {{ $course->price }} ₸</p>
                @if(Auth::user()->role->name == 'Admin')
                <div class="mt-4 flex justify-between items-center">
                    <a href="{{ route('course_show', $course->id) }}" class="text-blue-600 hover:underline">Толығырақ</a>
                    <a href="{{ route('course_edit', $course->id) }}" class="text-yellow-600 hover:underline">Өңдеу</a>
                    <form action="{{ route('course_delete', $course->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Жою</button>
                    </form>
                </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
