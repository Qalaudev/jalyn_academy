@include('admin.index')
<div class="relative max-h-[400px] overflow-x-auto overflow-y-auto mt-[20px] ml-[350px] mr-[100px]">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">ID</th>
            <th scope="col" class="px-6 py-3">Title</th>
            <th scope="col" class="px-6 py-3">Level</th>
            <th scope="col" class="px-6 py-3">Format</th>
            <th scope="col" class="px-6 py-3">Code</th>
            <th scope="col" class="px-6 py-3">Price</th>
            <th scope="col" class="px-6 py-3">Permission</th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$course->id}}
                </th>
                <td class="px-6 py-4">{{$course->title}}</td>
                <td class="px-6 py-4">{{$course->level}}</td>
                <td class="px-6 py-4">{{$course->format}}</td>
                <td class="px-6 py-4">{{$course->code}}</td>
                <td class="px-6 py-4">{{$course->price}}</td>
                <td class="px-6 py-4">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
                    </label>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
