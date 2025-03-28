@include('layout.header')

@if(Auth::user()->role->name == 'Admin')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Курс қосу</h1>
    <form action="{{ route('course_create') }}" method="POST" enctype="multipart/form-data" class="max-w-md bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        <!-- Курс атауы -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Курс атауы</label>
            <input type="text" name="title" id="title" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <!-- Сипаттама -->
        <div class="mb-6">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Сипаттама</label>
            <textarea name="description" id="description" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="4"></textarea>
        </div>

        <!-- Сурет -->
        <div class="mb-6">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Курстың суреті</label>
            <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <!-- Бағасы -->
        <div class="mb-6">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Бағасы</label>
            <input type="number" name="price" id="price" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <!-- Жіберу түймесі -->
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Құру
            </button>
        </div>
    </form>
</div>
@endif
