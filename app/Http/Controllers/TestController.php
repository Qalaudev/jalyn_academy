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

            if (!is_array($selectedAnswers)) {
                $selectedAnswers = [$selectedAnswers];
            }

            $isCorrect = empty(array_diff($correctAnswers, $selectedAnswers)) && empty(array_diff($selectedAnswers, $correctAnswers));

            if ($isCorrect) {
                $score++;
            }
        }

        // Получаем ID курса через связку trainingProgram → course
        $courseId = $trainingProgram->course_id;

        return view('test.result', [
            'total' => $questions->count(),
            'score' => $score,
            'course_id' => $courseId,
        ]);
    }

}
