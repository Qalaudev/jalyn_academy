@include('admin.index')
<div class="relative max-w-4xl mx-auto p-6 bg-white rounded-2xl shadow-lg mt-10">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Қолданушыға курстарды тағайындау: {{$user->name}}</h2>
    <form action="{{ route('admin.users.updateCourses', $user->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('POST')
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach($courses as $course)
                <div class="flex items-center p-3 border rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
                    <input type="checkbox" name="courses[]" value="{{ $course->id }}" id="course_{{ $course->id }}" class="text-blue-600 focus:ring-blue-500 h-5 w-5 mr-3" {{ in_array($course->id, $userCourses) ? 'checked' : '' }}>
                    <label for="course_{{ $course->id }}" class="text-sm font-medium text-gray-700">{{ $course->title }}</label>
                </div>
            @endforeach
                <button type="submit"
                        class="bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition-colors">
                    Сақтау
                </button>
        </div>
        <div class="text-center">
        </div>
    </form>
</div>

