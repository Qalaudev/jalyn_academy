@include('layout.header')
<div class="container mx-auto px-4 py-6">
    @include('layout.header')
    <h1 class="text-2xl font-bold mb-6">Рольді өңдеу</h1>
    <form action="{{ route('role_update', $role->id) }}" method="POST" class="max-w-md bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('POST')
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Рөл атауы</label>
            <input type="text" name="name" id="name" value="{{ $role->name }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-6">
            <label for="code" class="block text-gray-700 text-sm font-bold mb-2">Код</label>
            <input type="text" name="code" id="code" value="{{ $role->code }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Жаңарту
            </button>
        </div>
    </form>
</div>
