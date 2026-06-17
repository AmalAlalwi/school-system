<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classrooms = [
            ['name' => 'Grade 1-A', 'description' => 'First Grade Class A - Focus on foundational learning'],
            ['name' => 'Grade 1-B', 'description' => 'First Grade Class B - Small group instruction'],
            ['name' => 'Grade 2-A', 'description' => 'Second Grade Class A - Building core competencies'],
            ['name' => 'Grade 2-B', 'description' => 'Second Grade Class B - Interactive learning environment'],
            ['name' => 'Grade 3-A', 'description' => 'Third Grade Class A - Advanced skill development'],
            ['name' => 'Grade 3-B', 'description' => 'Third Grade Class B - Collaborative learning space'],
            ['name' => 'Grade 4-A', 'description' => 'Fourth Grade Class A - STEM and arts integration'],
            ['name' => 'Grade 4-B', 'description' => 'Fourth Grade Class B - Project-based learning'],
            ['name' => 'Grade 5-A', 'description' => 'Fifth Grade Class A - Critical thinking focus'],
            ['name' => 'Grade 5-B', 'description' => 'Fifth Grade Class B - Leadership development'],
            ['name' => 'Grade 6-A', 'description' => 'Sixth Grade Class A - Middle school transition'],
            ['name' => 'Grade 6-B', 'description' => 'Sixth Grade Class B - Student responsibility'],
            ['name' => 'Advanced Program', 'description' => 'Advanced learners program with enriched curriculum'],
            ['name' => 'Special Education', 'description' => 'Specialized support for diverse learning needs'],
            ['name' => 'Art & Music', 'description' => 'Creative expression and artistic development'],
        ];

        foreach ($classrooms as $classroom) {
            Classroom::create([
                'name' => $classroom['name'],
                'description' => $classroom['description'],
                'capacity' => fake()->numberBetween(25, 35),
            ]);
        }
    }
}
