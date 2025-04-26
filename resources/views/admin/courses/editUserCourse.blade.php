@include('admin.index')
<div class="relative max-h-[400px] overflow-x-auto overflow-y-auto mt-[20px] ml-[350px] mr-[100px]">
    <h2 class="text-xl font-bold">Қолданушыға курстарды тағайындау: {{$user->name}}</h2>
    <form action="{{ route('admin.users.updateCourses', $user->id) }}" method="POST">
        @csrf
        @method('POST')

        <div class="space-y-4">
            @foreach($courses as $course)
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="courses[]" value="{{ $course->id }}"
                           {{ in_array($course->id, $userCourses) ? 'checked' : '' }}
                           id="course_{{ $course->id }}">
                    <label for="course_{{ $course->id }}" class="text-sm">{{ $course->title }}</label>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Сақтау</button>
        </div>
    </form>
</div>
