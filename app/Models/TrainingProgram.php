<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    protected $table = 'training_programs';
    protected $fillable = [
      'name',
      'description',
      'course_id',
      'video_url'
    ];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
