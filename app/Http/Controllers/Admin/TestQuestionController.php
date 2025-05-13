<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\TestQuestion;
use App\Models\TestAnswer;
use Illuminate\Http\Request;

class TestQuestionController extends Controller
{
    public function index()
    {
        $questions = TestQuestion::with('answers')->latest()->get();
        return view('admin.questions.index', compact('questions'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('admin.questions.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'question' => 'required|string',
            'answers.*' => 'required|string',
            'correct' => 'required|integer|min:0|max:3',
        ]);

        $question = TestQuestion::create([
            'menu_id' => $request->menu_id,
            'question' => $request->question,
        ]);

        foreach ($request->answers as $i => $answer) {
            $question->answers()->create([
                'answer' => $answer,
                'is_correct' => $i == $request->correct,
            ]);
        }

        return redirect()->route('questions.index')->with('success', 'Сұрақ қосылды!');
    }

    public function edit(TestQuestion $question)
    {
        $menus = Menu::all();
        $question->load('answers');
        return view('admin.questions.edit', compact('question', 'menus'));
    }

    public function update(Request $request, TestQuestion $question)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'question' => 'required|string',
            'answers.*' => 'required|string',
            'correct' => 'required|integer|min:0|max:3',
        ]);

        $question->update([
            'menu_id' => $request->menu_id,
            'question' => $request->question,
        ]);

        $question->answers()->delete();
        foreach ($request->answers as $i => $answer) {
            $question->answers()->create([
                'answer' => $answer,
                'is_correct' => $i == $request->correct,
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
