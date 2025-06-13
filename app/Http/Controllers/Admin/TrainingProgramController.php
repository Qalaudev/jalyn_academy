<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrainingProgram;
use App\Models\Course;
use Illuminate\Http\Request;

class TrainingProgramController extends Controller
{
    public function index()
    {
        $trainingPrograms = TrainingProgram::with('course')->latest()->get();
        return view('admin.training_programs.index', compact('trainingPrograms'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('admin.training_programs.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'course_id' => 'required|exists:courses,id',
            'task' => 'required|string',
        ]);

        TrainingProgram::create($request->all());

        return redirect()->route('training_programs.index')
            ->with('success', 'Training Program created successfully.');
    }

    public function edit(TrainingProgram $trainingProgram)
    {
        $courses = Course::all();
        return view('admin.training_programs.edit', compact('trainingProgram', 'courses'));
    }

    public function update(Request $request, TrainingProgram $trainingProgram)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'course_id' => 'required|exists:courses,id',
            'task' => 'required|string',
        ]);

        $trainingProgram->update($request->all());

        return redirect()->route('training_programs.index')
            ->with('success', 'Training Program updated successfully.');
    }

    public function destroy(TrainingProgram $trainingProgram)
    {
        $trainingProgram->delete();

        return redirect()->route('training_programs.index')
            ->with('success', 'Training Program deleted successfully.');
    }
}
