@include('admin.index')
<div class="relative max-h-[400px] overflow-x-auto overflow-y-auto mt-[20px] ml-[350px] mr-[100px]">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">ID</th>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Email</th>
            <th scope="col" class="px-6 py-3">Description</th>
            <th scope="col" class="px-6 py-3">Время</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($notifications as $note)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$note->id}}
                </th>
                <td class="px-6 py-4">{{$note->name}}</td>
                <td class="px-6 py-4">{{$note->email}}</td>
                <td class="px-6 py-4">{{$note->description}}</td>
                <td class="px-6 py-4">{{$note->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

