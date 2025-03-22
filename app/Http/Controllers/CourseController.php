<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
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
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric|min:0',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('courses', 'public');
        }

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Курс сәтті қосылды!');
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


    /**
     * Remove the specified resource from storage.
     */
    public function destroyCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('course_index')->with('success', 'Курс сәтті жойылды!');
    }


}
