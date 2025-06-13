<?php

namespace App\Http\Controllers;

use App\Models\TrainingProgram;
use Illuminate\Http\Request;
use App\Models\TestQuestion;

class TestController extends Controller
{
    public function show(TrainingProgram $trainingProgram)
    {
        $questions = $trainingProgram->testQuestions()->with('answers')->get();
        return view('test.show', compact('trainingProgram', 'questions'));
    }

    public function submit(Request $request, TrainingProgram $trainingProgram)
    {
        $questions = $trainingProgram->testQuestions()->with('answers')->get();
        $score = 0;

        foreach ($questions as $question) {
            $selectedAnswers = $request->input("question_{$question->id}", []);
            $correctAnswers = $question->answers->where('is_correct', true)->pluck('id')->toArray();

            // Convert selectedAnswers to array if it's not already (e.g., if only one checkbox was selected)
            if (!is_array($selectedAnswers)) {
                $selectedAnswers = [$selectedAnswers];
            }

            // Check if all correct answers are selected and no incorrect answers are selected
            $isCorrect = empty(array_diff($correctAnswers, $selectedAnswers)) && empty(array_diff($selectedAnswers, $correctAnswers));

            if ($isCorrect) {
                $score++;
            }
        }

        return view('test.result', [
            'total' => $questions->count(),
            'score' => $score
        ]);
    }
}
