<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'completed_lessons',
        'total_lessons',
        'progress_percentage',
        'is_completed',
        'last_activity_at'
    ];

    protected $casts = [
        'is_completed' => 'boolean',
        'last_activity_at' => 'datetime',
        'progress_percentage' => 'decimal:2',
        'completed_lesson_ids' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function updateProgress()
    {
        $this->progress_percentage = ($this->completed_lessons / $this->total_lessons) * 100;
        $this->is_completed = $this->progress_percentage >= 100;
        $this->last_activity_at = now();
        $this->save();
    }
}
