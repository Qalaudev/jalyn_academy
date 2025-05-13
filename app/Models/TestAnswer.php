<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestAnswer extends Model
{
    protected $fillable = ['test_question_id', 'answer', 'is_correct'];

    public function question(): BelongsTo
    {
        return $this->belongsTo(TestQuestion::class);
    }
}
