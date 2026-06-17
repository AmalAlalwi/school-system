<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Classroom;

class StudentController extends Controller
{
    public function index()
    {
       $request = request();
       $query = Student::query();
       $name = $request->query('name');
       $capacity = $request->query('capacity');
       if ($name) {
           $query->where('name', 'like', "%$name%");
       }
         if ($capacity) {
              $query->where('capacity', $capacity);
        }
        return view('dashboard.pages.student.index',[
            'students' => $query->paginate(5),
            'classrooms' => Classroom::all(),
        ]);
        
    }
    public function create()
    {
        $classrooms = Classroom::all();
        return view('dashboard.pages.student.create', compact('classrooms'));  
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'classroom_id' => 'required|exists:classrooms,id',
        ],[
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'classroom_id.required' => 'The classroom field is required.',
            'classroom_id.exists' => 'The selected classroom is invalid.',
        ]);
        Student::create($request->all());
        return redirect()->route('student.index')
                        ->with('success','Student created successfully.');  
    }
    public function edit($id){
        $student = Student::find($id);
        $classrooms = Classroom::all();
        return view('dashboard.pages.student.edit', compact('student', 'classrooms'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'sometimes|required|string', 
            'email' => 'sometimes|required|email|unique:students,email,'.$id,
            'classroom_id' => 'sometimes|required|exists:classrooms,id',
        ]);
        $student = Student::find($id);
        $student->update($request->all());
        return redirect()->route('student.index')
                        ->with('success','Student updated successfully');
    }
    public function destroy($id){
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('student.index')
                        ->with('success','Student deleted successfully');
    }
}
