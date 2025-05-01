<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'duration_weeks',
        'schedule',
        'level',
        'format',
        'start_date',
        'spots_left',
        'code',
        'price',
        'is_active'
    ];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function trainingProgram()
    {
        return $this->hasOne(TrainingProgram::class);
    }

    public function trainingPrograms()
    {
        return $this->hasMany(TrainingProgram::class);
    }


}
