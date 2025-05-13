<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'description',
        'training_program_id'
    ];

    public function testQuestions()
    {
        return $this->hasMany(TestQuestion::class);
    }


}
