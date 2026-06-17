<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ClassroomController;
use App\Http\Controllers\Dashboard\TeacherController;
use App\Http\Controllers\Dashboard\StudentController;

Route::middleware('auth')->group(function () {
Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');
Route::resource('classroom', ClassroomController::class);
Route::resource('teacher', TeacherController::class);
Route::resource('student', StudentController::class);
});