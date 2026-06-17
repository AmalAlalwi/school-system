<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classroom;
class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'students' => Student::count(),
            'classrooms' => Classroom::count(),
            'teachers' => Teacher::count(),
        ];
        return view('dashboard.pages.index', compact('stats'));
    }
}
