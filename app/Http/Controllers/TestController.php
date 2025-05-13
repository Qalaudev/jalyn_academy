<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function show(Menu $menu)
    {
        $questions = $menu->testQuestions()->with('answers')->get();
        return view('test.show', compact('menu', 'questions'));
    }

    public function submit(Request $request, Menu $menu)
    {
        $questions = $menu->testQuestions()->with('answers')->get();
        $score = 0;

        foreach ($questions as $question) {
            $selected = $request->input("question_{$question->id}");
            $correct = $question->answers->where('is_correct', true)->first();
            if ($correct && $selected == $correct->id) {
                $score++;
            }
        }

        return view('test.result', [
            'total' => $questions->count(),
            'score' => $score
        ]);
    }
}
