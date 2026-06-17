<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Classroom;
class TeacherController extends Controller
{
    public function index()
    {
       $request = request();
       $query = Teacher::query();
       $name = $request->query('name');
       $classroom_id = $request->query('classroom_id');
       $specialization= $request->query('specialization');
       if ($name) {
           $query->where('name', 'like', "%$name%");
       }
         if ($classroom_id) {
              $query->where('classroom_id', $classroom_id);
        }
        if($specialization){
            $query->where('specialization', $specialization);
        }
        return view('dashboard.pages.teacher.index',[
            'teachers' => $query->paginate(5),
            'classrooms' => Classroom::all(),
        ]);
    }
    public function create()
    {
        $classrooms = Classroom::all();
        return view('dashboard.pages.teacher.create', compact('classrooms'));  
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:teachers,email',
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
      
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->specialization = $request->specialization;
        $teacher->classroom_id = $request->classroom_id;
        $teacher->save();
        
        return redirect()->route('teacher.index')
                        ->with('success','Teacher created successfully.');
    }
    public function edit($id){
        $teacher = Teacher::find($id);
        $classrooms = Classroom::all();
        return view('dashboard.pages.teacher.edit', compact('teacher', 'classrooms'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:teachers,email,'.$id,   
            'classroom_id' => 'sometimes|required|exists:classrooms,id',
        ]);
        $teacher = Teacher::find($id);
        $teacher->update($request->all());
        return redirect()->route('teacher.index')
                        ->with('success','Teacher updated successfully');
        }
    public function destroy($id){
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect()->route('teacher.index')
                        ->with('success','Teacher deleted successfully');
    }
}
