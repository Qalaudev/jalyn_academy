<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProgress;
use App\Models\Course;
use App\Models\Certificate;
use App\Models\TrainingProgram;

class UserProgressController extends Controller
{
    public function index()
    {
        $progress = UserProgress::where('user_id', auth()->id())
            ->with(['course'])
            ->get();

        return view('progress.index', compact('progress'));
    }

    public function show(Course $course)
    {
        $progress = UserProgress::where('user_id', auth()->id())
            ->where('course_id', $course->id)
            ->firstOrFail();

        return view('progress.show', compact('progress', 'course'));
    }

    public function update(Request $request, Course $course)
    {
        $progress = UserProgress::where('user_id', auth()->id())
            ->where('course_id', $course->id)
            ->firstOrFail();

        $progress->completed_lessons = $request->completed_lessons;
        $progress->updateProgress();

        if ($progress->is_completed) {
            // Создаем сертификат при завершении курса
            Certificate::firstOrCreate([
                'user_id' => auth()->id(),
                'course_id' => $course->id,
            ])->generateCertificate();
        }

        return redirect()->back()->with('success', 'Прогресс успешно обновлен');
    }

    public function markLessonCompleted(Request $request)
    {
        try {
            $request->validate([
                'course_id' => 'required|exists:courses,id',
                'lesson_id' => 'required|exists:training_programs,id',
            ]);

            $user = auth()->user();
            $courseId = $request->course_id;
            $lessonId = $request->lesson_id;

            $course = Course::findOrFail($courseId); // безопаснее, чем просто find()

            $userProgress = UserProgress::firstOrCreate(
                ['user_id' => $user->id, 'course_id' => $courseId],
                ['total_lessons' => $course->trainingPrograms->count()]
            );

            // 🛡 Защита от null
            $completedLessonIds = $userProgress->completed_lesson_ids ?? [];

            if (!in_array($lessonId, $completedLessonIds)) {
                $completedLessonIds[] = $lessonId;
                $userProgress->completed_lesson_ids = $completedLessonIds;
                $userProgress->completed_lessons = count($completedLessonIds);
                $userProgress->updateProgress();

                if ($userProgress->is_completed) {
                    Certificate::firstOrCreate([
                        'user_id' => $user->id,
                        'course_id' => $courseId,
                    ])->generateCertificate();
                }
            }

            $certificate = Certificate::where('user_id', $user->id)
                ->where('course_id', $courseId)
                ->first();

            return response()->json([
                'message' => 'Прогресс обновлен',
                'progress_percentage' => round($userProgress->progress_percentage, 0),
                'is_completed' => $userProgress->is_completed,
                'certificate_id' => $userProgress->is_completed ? $certificate->id : null,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Произошла ошибка при обновлении прогресса.',
                'details' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], 500);
        }
    }
}
