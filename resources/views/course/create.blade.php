@include('layout.header')
@include('layout.navbar')

<div class="container mx-auto px-4 py-6 flex flex-col items-center">
    <h1 class="text-3xl font-bold text-center mb-6">Курс қосу</h1>
    <form action="{{ route('course_create') }}" method="POST" enctype="multipart/form-data" class="w-full max-w-lg bg-white shadow-lg rounded-lg p-6">
        @csrf

        <!-- Курс атауы -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Курс атауы</label>
            <input type="text" name="title" id="title" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Сипаттама -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Сипаттама</label>
            <textarea name="description" id="description" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none" rows="4"></textarea>
        </div>

        <!-- Сурет -->
        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Курстың суреті</label>
            <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Бағасы -->
        <div class="mb-6">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Бағасы</label>
            <input type="number" name="price" id="price" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Жіберу түймесі -->
        <div class="flex justify-center">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition-all duration-300 ease-in-out shadow-md">
                Құру
            </button>
        </div>
    </form>

    <div class="mt-4">
        <a href="{{ route('course_index') }}" class="text-blue-600 hover:underline">Курстар тізіміне оралу</a>
    </div>
</div>
