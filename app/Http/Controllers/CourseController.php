<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\TrainingProgram;
use App\Models\UserProgress;
use App\Models\Certificate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = auth()->user()->courses;
        return view('course.index', compact('courses'));
    }

    public function downloadCertificate($id)
    {
        $course = Course::findOrFail($id);
        $user = auth()->user();

        // Прогресс по урокам (если считаешь по lessons)
        $total = $course->lessons()->count();
        $completed = $user->trainingPrograms()->whereIn('training_programs_id', $course->lessons->pluck('id'))->count();

        $progress = $total > 0 ? intval(($completed / $total) * 100) : 0;

        if ($progress < 100) {
            abort(403, 'Курс толық аяқталмаған. Сертификат қолжетімді емес.');
        }

        $data = [
            'name' => $user->name,
            'course' => $course->title,
            'date' => now()->format('d.m.Y'),
        ];

        $pdf = Pdf::loadView('certificate', $data);
        return $pdf->download("certificate-{$course->id}.pdf");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createCourseForm()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createCourse(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'duration_weeks' => 'required|integer',
            'schedule' => 'required|string',
            'level' => 'required|string',
            'format' => 'required|string',
            'start_date' => 'required|date',
            'spots_left' => 'required|integer',
            'code' => 'nullable|string',
            'price' => 'required|integer',
        ]);

        Course::create($data);
        $courses = Course::latest()->get();

        return view('welcome', compact('courses'));
    }


    /**
     * Display the specified resource.
     */
    public function showCourse($id)
    {
        $course = Course::findOrFail($id);
        return view('course.show', compact('course'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function editCourse($id)
    {
        $course = Course::findOrFail($id);
        return view('course.edit', compact('course'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateCourse(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $imagePath = $course->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                \Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('courses', 'public');
        }

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'price' => $request->price,
        ]);

        return redirect()->route('course_index')->with('success', 'Курс сәтті жаңартылды!');
    }

    public function getCourses()
    {
        $courses = Course::latest()->get();
        return response()->json($courses);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroyCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('course_index')->with('success', 'Курс сәтті жойылды!');
    }



    public function courseLearn($id)
    {
        $course = Course::with('trainingPrograms.menus')->findOrFail($id);
        $user = auth()->user();

        $userProgress = UserProgress::firstOrCreate(
            ['user_id' => $user->id, 'course_id' => $course->id],
            ['total_lessons' => $course->trainingPrograms->count()]
        );

        $certificate = Certificate::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->first();

        return view('course.learn', compact('course', 'userProgress', 'certificate'));
    }



}
