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
        Teacher::create([
            'name' => 'Teacher 1',
            'email' => 'teacher1@gmail.com',
            'phone' => '0955684221',
            'specialization' => 'Math teacher',
            'classroom_id' => Classroom::inRandomOrder()->value('id'),
        ]);

        Teacher::create([
            'name' => 'Teacher 2',
            'email' => 'teacher2@gmail.com',
            'phone' => '0955684221',
            'specialization' => 'Arabic teacher',
            'classroom_id' => Classroom::inRandomOrder()->value('id'),
        ]);

        Teacher::create([
            'name' => 'Teacher 3',
            'email' => 'teacher3@gmail.com',
            'phone' => '0955684221',
            'specialization' => 'English teacher',
            'classroom_id' => Classroom::inRandomOrder()->value('id'),
        ]);
    }
}
