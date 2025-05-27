<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\Course;
use App\Models\TrainingProgram;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function users()
    {
        $users = User::all();
        return view('admin.users.users',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function courses(Request $request)
    {
        /*$courses = Course::all();
        return view('admin.courses.courses',compact('courses'));*/
        $courses = Course::all();

        if ($request->expectsJson()) {
            return response()->json($courses);
        }

        return view('admin.courses.courses', compact('courses'));
    }


    public function editCourses(User $user)
    {
        $courses = Course::all();
        $userCourses = $user->courses()->pluck('course_id')->toArray();
        return view('admin.courses.editUserCourse',compact('courses','userCourses','user'));
    }

    public function updateCourses(Request $request, User $user)
    {
        $user->courses()->sync($request->courses);
        return redirect()->route('admin.dashboard')->with('success','Courses updated successfully');
    }

    public function userCourses(User $user)
    {
        $courses = $user->courses()->get();
        return view('admin.users.userCourses',compact('courses','user'));
    }


    public function coursesShow($id){
        /*$course = Course::findOrFail($id);
        return view('admin.courses.coursesShow',compact('course'));*/
        $course = Course::with('trainingPrograms')->findOrFail($id);

        if (request()->expectsJson()) {
            return response()->json($course);
        }

        return view('admin.courses.coursesShow', compact('course'));
    }


    /*public function courseTrainingProgram(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'video_url' =>  'required',
        ]);

        TrainingProgram::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'course_id' => $course->id,
            'video_url' => $validated['video_url'],
        ]);

        return redirect()->back()->with('success', 'Программа обучения сохранена!');
    }*/
    public function courseTrainingProgram(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'video_url' =>  'required',
        ]);

        $program = TrainingProgram::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'course_id' => $course->id,
            'video_url' => $validated['video_url'],
        ]);

        // 👇 Вот ключ:
        if ($request->expectsJson()) {
            return response()->json(['message' => 'OK', 'program' => $program]);
        }

        return redirect()->back()->with('success', 'Программа обучения сохранена!');
    }


}
