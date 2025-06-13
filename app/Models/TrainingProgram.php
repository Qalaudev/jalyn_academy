<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrainingProgram extends Model
{
    protected $table = 'training_programs';
    protected $fillable = [
      'name',
      'description',
      'course_id',
      'video_url'
    ];


//    public function course()
//    {
//        return $this->belongsTo(Course::class);
//    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function testQuestions(): HasMany
    {
        return $this->hasMany(TestQuestion::class);
    }

}
