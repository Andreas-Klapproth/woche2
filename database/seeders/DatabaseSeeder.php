<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $courses = [
            ['titel' => 'Laravel-Basis', 'beschreibung' => 'Erste Schritte in Laravel'],
            ['titel' => 'IT-Basics', 'beschreibung' => 'Erste Schritte am PC'],
            ['titel' => 'Web-Basis', 'beschreibung' => 'Erste Schritte im Internet'],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }


        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
