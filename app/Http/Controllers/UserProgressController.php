<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProgress;
use App\Models\Course;
use App\Models\Certificate;
use App\Models\TrainingProgram;
use Illuminate\Support\Facades\Log;

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
            $certificate = Certificate::firstOrCreate([
                'user_id' => auth()->id(),
                'course_id' => $course->id,
            ]);

            // Убедимся, что отношения user и course загружены
            $certificate->loadMissing('user', 'course');
            $certificate->generateCertificate();

            if (!$certificate->save()) {
                Log::error('Ошибка сохранения сертификата в методе update для пользователя ' . auth()->id() . ' и курса ' . $course->id);
            }
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

            // Явно убеждаемся, что completed_lesson_ids является массивом
            if (!is_array($userProgress->completed_lesson_ids)) {
                $userProgress->completed_lesson_ids = [];
            }

            $completedLessonIds = $userProgress->completed_lesson_ids;

            if (!in_array($lessonId, $completedLessonIds)) {
                $completedLessonIds[] = $lessonId;
                $userProgress->completed_lesson_ids = $completedLessonIds;
                $userProgress->completed_lessons = count($completedLessonIds);
                $userProgress->updateProgress();

                if ($userProgress->is_completed) {
                    $certificate = Certificate::firstOrCreate([
                        'user_id' => $user->id,
                        'course_id' => $courseId,
                    ]);

                    // Убедимся, что отношения user и course загружены
                    $certificate->loadMissing('user', 'course');
                    $certificate->generateCertificate();

                    if (!$certificate->save()) {
                        // Логируем ошибку, если сохранение не удалось
                        Log::error('Ошибка сохранения сертификата для пользователя ' . $user->id . ' и курса ' . $courseId);
                    }
                }
            }

            // Заново извлекаем сертификат, чтобы убедиться, что он есть в ответе, если курс завершен
            $certificate = Certificate::where('user_id', $user->id)
                ->where('course_id', $courseId)
                ->first();

            return response()->json([
                'message' => 'Прогресс обновлен',
                'progress_percentage' => round($userProgress->progress_percentage, 0),
                'is_completed' => $userProgress->is_completed,
                'certificate_id' => $userProgress->is_completed && $certificate ? $certificate->id : null,
                'completed_lesson_ids' => $userProgress->completed_lesson_ids
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
