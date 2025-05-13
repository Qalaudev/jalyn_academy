@include('admin.index')

<form action="{{ route('store.menu') }}" method="POST" class="mt-6 space-y-4 max-w-xl mx-auto">
    @csrf
    <div class="sm:col-span-2 sm:col-start-1">
        <label for="attention" class="block text-sm font-medium text-gray-900">Название</label>
        <div class="mt-2">
            <input type="text" name="name" id="name" autocomplete="address-level2"
                   class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
        </div>
    </div>

    <div class="sm:col-span-2">
        <label for="description" class="block text-sm font-medium text-gray-900">Описание</label>
        <div class="mt-2">
                <textarea name="description" id="description" rows="3" cols="30"
                          class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm resize-none"></textarea>
        </div>
    </div>

    <div class="sm:col-span-2">
        <label for="trainingProgram" class="block text-sm font-medium text-gray-900">
            Выберите программу обучение
        </label>
        <div class="mt-2">
            <select name="trainingProgram" id="trainingProgram" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                @foreach($trainingPrograms as $trainingProgram)
                    <option value="{{ $trainingProgram->id }}">{{ $trainingProgram->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-300 ease-in-out focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Добавить
    </button>
</form>

@if(session('success'))
    <div class="mt-4 p-4 text-green-700 bg-green-200 rounded-lg">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mt-4 p-4 text-red-700 bg-red-200 rounded-lg">
        {{ session('error') }}
    </div>
@endif
