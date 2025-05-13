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
            'title' => 'PHP тілі курсы (web бағдарлама)',
            'description' => 'Бастапқы деңгейге арналған, курс соңында өз жобаңызды жасап шығасыз',
        ]);

        TrainingProgram::create([
            'name' => '1 тарау. PHP-ге кіріспе',
            'description' => 'Learn the basics of PHP programming.',
            'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'course_id' => $course->id,
        ]);

        TrainingProgram::create([
            'name' => '2 тарау. PHP негіздері',
            'description' => 'Deep dive into advanced PHP techniques.',
            'video_url' => 'https://www.youtube.com/embed/eBvCZSewOIg',
            'course_id' => $course->id,
        ]);

        TrainingProgram::create([
            'name' => '3-тарау. Деректерді серверге жіберу',
            'description' => 'Learn how to work with databases in PHP.',
            'video_url' => 'https://www.youtube.com/embed/3b7sXv-ckds',
            'course_id' => $course->id,
        ]);

        TrainingProgram::create([
            'name' => '4-тарау. Объектіге бағытталған бағдарламалау',
            'description' => 'Learn to build RESTful APIs with PHP.',
            'video_url' => 'https://www.youtube.com/embed/FT3EkuyUoA4',
            'course_id' => $course->id,
        ]);

        TrainingProgram::create([
            'name' => '4-тарау. Объектіге бағытталған бағдарламалау',
            'description' => 'Learn to build RESTful APIs with PHP.',
            'video_url' => 'https://www.youtube.com/embed/FT3EkuyUoA4',
            'course_id' => $course->id,
        ]);

        TrainingProgram::create([
            'name' => '5-тарау. PHP негізгі мүмкіндіктері',
            'description' => 'Learn to build RESTful APIs with PHP.',
            'video_url' => 'https://www.youtube.com/embed/FT3EkuyUoA4',
            'course_id' => $course->id,
        ]);

        TrainingProgram::create([
            'name' => '6-тарау. Ерекшеліктерді өңдеу',
            'description' => 'Learn to build RESTful APIs with PHP.',
            'video_url' => 'https://www.youtube.com/embed/FT3EkuyUoA4',
            'course_id' => $course->id,
        ]);

        TrainingProgram::create([
            'name' => 'Глава 7. Работа с файловой системой',
            'description' => 'Learn to build RESTful APIs with PHP.',
            'video_url' => 'https://www.youtube.com/embed/FT3EkuyUoA4',
            'course_id' => $course->id,
        ]);
    }
}
