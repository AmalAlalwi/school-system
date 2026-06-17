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
        Student::create([
            'name' => 'Student 1',
            'email' => 'student1@gmail.com',
            'phone' => '0955684221',
            'birth_date' => fake()->dateTimeBetween('-25 years', '-18 years')->format('Y-m-d'),
            'classroom_id' => Classroom::inRandomOrder()->value('id')
         ]);
         Student::create([
            'name' => 'Student 2',
            'email' => 'student2@gmail.com',
            'phone' => '0955684221',
            'birth_date' => fake()->dateTimeBetween('-25 years', '-18 years')->format('Y-m-d'),
            'classroom_id' => Classroom::inRandomOrder()->value('id')
        ]);
        Student::create([
            'name' => 'Student 3',
            'email' => 'student3@gmail.com',
            'phone' => '0955684221',
            'birth_date' => fake()->dateTimeBetween('-25 years', '-18 years')->format('Y-m-d'),
            'classroom_id' => Classroom::inRandomOrder()->value('id')
        ]);
    }
}
