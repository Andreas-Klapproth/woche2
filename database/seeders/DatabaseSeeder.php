<?php

namespace Database\Seeders;

use App\Models\Interest;
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
            ['title' => 'Laravel-Basis', 'description' => 'Erste Schritte in Laravel'],
            ['title' => 'IT-Basics', 'description' => 'Erste Schritte am PC'],
            ['title' => 'Web-Basis', 'description' => 'Erste Schritte im Internet'],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }

        $interests = ['Backend', 'Frontend', 'Datenbank', 'Testing'];

        foreach ($interests as $name) {
            Interest::create(['name' => $name]);
        }


        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
