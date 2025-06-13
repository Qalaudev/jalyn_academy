<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrainingProgram;
use App\Models\TestQuestion;
use App\Models\TestAnswer;
use Illuminate\Http\Request;

class TestQuestionController extends Controller
{
    public function index()
    {
        $questions = TestQuestion::with(['answers', 'trainingProgram'])->latest()->get();
        return view('admin.questions.index', compact('questions'));
    }

    public function create()
    {
        $trainingPrograms = TrainingProgram::all();
        $questions = TestQuestion::with('trainingProgram')->latest()->get();
        return view('admin.questions.create', compact('trainingPrograms', 'questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'training_program_id' => 'required|exists:training_programs,id',
            'question' => 'required|string',
            'answers' => 'required|array|min:1',
            'answers.*' => 'required|string',
            'correct_answers' => 'array',
            'correct_answers.*' => 'integer|min:0|max:3',
        ]);

        $question = TestQuestion::create([
            'training_program_id' => $request->training_program_id,
            'question' => $request->question,
        ]);

        $correctAnswers = $request->input('correct_answers', []);

        foreach ($request->answers as $i => $answer) {
            $question->answers()->create([
                'answer' => $answer,
                'is_correct' => in_array($i, $correctAnswers),
            ]);
        }

        return redirect()->route('questions.index')->with('success', 'Сұрақ қосылды!');
    }

    public function edit(TestQuestion $question)
    {
        $trainingPrograms = TrainingProgram::all();
        $question->load('answers');
        return view('admin.questions.edit', compact('question', 'trainingPrograms'));
    }

    public function update(Request $request, TestQuestion $question)
    {
        $request->validate([
            'training_program_id' => 'required|exists:training_programs,id',
            'question' => 'required|string',
            'answers' => 'required|array|min:1',
            'answers.*' => 'required|string',
            'correct_answers' => 'array',
            'correct_answers.*' => 'integer|min:0|max:3',
        ]);

        $question->update([
            'training_program_id' => $request->training_program_id,
            'question' => $request->question,
        ]);

        $question->answers()->delete();
        $correctAnswers = $request->input('correct_answers', []);

        foreach ($request->answers as $i => $answer) {
            $question->answers()->create([
                'answer' => $answer,
                'is_correct' => in_array($i, $correctAnswers),
            ]);
        }

        return redirect()->route('questions.index')->with('success', 'Сұрақ жаңартылды!');
    }

    public function destroy(TestQuestion $question)
    {
        $question->delete();
        return back()->with('success', 'Сұрақ өшірілді!');
    }
}
