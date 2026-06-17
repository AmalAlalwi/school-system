<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            ['name' => 'Dr. Ahmed Hassan', 'specialization' => 'Mathematics'],
            ['name' => 'Fatima Al-Rashid', 'specialization' => 'Arabic Language'],
            ['name' => 'Mohammed Ibrahim', 'specialization' => 'English Language'],
            ['name' => 'Dr. Amina Saleh', 'specialization' => 'Science'],
            ['name' => 'Omar Abdullah', 'specialization' => 'Physical Education'],
            ['name' => 'Noor Khalil', 'specialization' => 'Art & Design'],
            ['name' => 'Tariq Yousef', 'specialization' => 'Computer Science'],
            ['name' => 'Layla Nasser', 'specialization' => 'History & Geography'],
            ['name' => 'Hassan Sami', 'specialization' => 'Islamic Studies'],
            ['name' => 'Dina Waleed', 'specialization' => 'Music & Performance'],
            ['name' => 'Rashid Karim', 'specialization' => 'Chemistry'],
            ['name' => 'Hana Mahmoud', 'specialization' => 'Biology'],
            ['name' => 'Karim Hassan', 'specialization' => 'Physics'],
            ['name' => 'Zainab Mohamed', 'specialization' => 'Social Studies'],
            ['name' => 'Sami Rashid', 'specialization' => 'Information Technology'],
        ];

        foreach ($teachers as $index => $teacher) {
            Teacher::create([
                'name' => $teacher['name'],
                'email' => 'teacher' . ($index + 1) . '@school.edu',
                'phone' => fake()->phoneNumber(),
                'specialization' => $teacher['specialization'],
                'classroom_id' => Classroom::inRandomOrder()->value('id') ?? null,
            ]);
        }
    }
}
