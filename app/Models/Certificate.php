<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'certificate_number',
        'issue_date',
        'status',
        'certificate_data'
    ];

    protected $casts = [
        'issue_date' => 'date',
        'certificate_data' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function generateCertificateNumber()
    {
        return 'CERT-' . strtoupper(uniqid()) . '-' . date('Y');
    }

    public function generateCertificate()
    {
        $this->certificate_number = $this->generateCertificateNumber();
        $this->issue_date = now();
        $this->certificate_data = [
            'user_name' => $this->user->name,
            'course_name' => $this->course->name,
            'completion_date' => $this->issue_date->format('Y-m-d'),
            'certificate_number' => $this->certificate_number
        ];
        $this->save();
    }
}
