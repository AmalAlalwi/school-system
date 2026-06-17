<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Classroom;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            'Ahmed Mohammad', 'Fatima Hassan', 'Mohammad Ali', 'Amina Ahmed',
            'Omar Ibrahim', 'Noor Abdullah', 'Zainab Karim', 'Ibrahim Sami',
            'Layla Rashid', 'Yousef Hamza', 'Hana Waleed', 'Karim Nasser',
            'Dina Mohamed', 'Hassan Salim', 'Leena Khalid'
        ];

        foreach ($students as $index => $name) {
            Student::create([
                'name' => $name,
                'email' => 'student' . ($index + 1) . '@school.edu',
                'phone' => fake()->phoneNumber(),
                'birth_date' => fake()->dateTimeBetween('-18 years', '-8 years')->format('Y-m-d'),
                'classroom_id' => Classroom::inRandomOrder()->value('id') ?? null
            ]);
        }
    }
}
