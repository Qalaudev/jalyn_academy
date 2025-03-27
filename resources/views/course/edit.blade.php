@include('layout.header')

<div class="container mx-auto px-4 py-6 flex justify-center">
    <div class="w-full max-w-lg lg:max-w-xl bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-bold text-center mb-6">Курс өңдеу</h1>

        <form action="{{ route('course_update', $course->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-gray-700 font-semibold mb-1">Курс атауы</label>
                <input type="text" name="title" id="title" value="{{ old('title', $course->title) }}" required class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-semibold mb-1">Курс сипаттамасы</label>
                <textarea name="description" id="description" rows="4" required class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">{{ old('description', $course->description) }}</textarea>
            </div>

            <div>
                <label for="image" class="block text-gray-700 font-semibold mb-1">Курстың суреті</label>
                <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="w-full border rounded-lg p-2 shadow-sm cursor-pointer">
                @if($course->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="w-32 h-32 object-cover rounded-lg border shadow">
                    </div>
                @endif
            </div>

            <div>
                <label for="price" class="block text-gray-700 font-semibold mb-1">Бағасы</label>
                <input type="number" name="price" id="price" value="{{ old('price', $course->price) }}" required class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                    Жаңарту
                </button>
            </div>
        </form>
    </div>
</div>
