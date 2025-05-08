<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\TrainingProgram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $course = Course::firstOrCreate([
            'title' => 'PHP Tutorial',
            'description' => 'Learn PHP from basics to advanced level.',
        ]);

        TrainingProgram::create([
            'name' => 'PHP Basics',
            'description' => 'Learn the basics of PHP programming.',
            'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'course_id' => $course->id,
        ]);

        TrainingProgram::create([
            'name' => 'Advanced PHP',
            'description' => 'Deep dive into advanced PHP techniques.',
            'video_url' => 'https://www.youtube.com/embed/eBvCZSewOIg',
            'course_id' => $course->id,
        ]);

        TrainingProgram::create([
            'name' => 'PHP and Databases',
            'description' => 'Learn how to work with databases in PHP.',
            'video_url' => 'https://www.youtube.com/embed/3b7sXv-ckds',
            'course_id' => $course->id,
        ]);

        TrainingProgram::create([
            'name' => 'Building APIs with PHP',
            'description' => 'Learn to build RESTful APIs with PHP.',
            'video_url' => 'https://www.youtube.com/embed/FT3EkuyUoA4',
            'course_id' => $course->id,
        ]);
    }
}
