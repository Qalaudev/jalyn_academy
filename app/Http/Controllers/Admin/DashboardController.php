<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProgress;
use App\Models\Course;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::with(['userProgress' => function($query) {
            $query->orderByDesc('last_activity_at');
        }])->get();

        $participantsData = [];

        foreach ($users as $user) {
            $lastCompletedTask = null;
            $courseName = null;

            if ($user->userProgress->isNotEmpty()) {
                $latestProgress = $user->userProgress->first();
                $lastCompletedTask = $latestProgress->completed_lessons; // Assuming this means a task
                $course = Course::find($latestProgress->course_id);
                if ($course) {
                    $courseName = $course->title;
                }
            }

            $participantsData[] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'last_completed_task' => $lastCompletedTask,
                'course' => $courseName,
            ];
        }

        return view('admin.dashboard.index', compact('participantsData'));
    }
}
