<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function index()
    {
       $request = request();
       $query = Classroom::query();
       $name = $request->query('name');
       $capacity = $request->query('capacity');
       if ($name) {
           $query->where('name', 'like', "%$name%");
       }
         if ($capacity) {
              $query->where('capacity', $capacity);
        }
        return view('dashboard.pages.classroom.index',[
            'classrooms' => $query->paginate(5),
        ]);
    }
    public function create()
    {
        return view('dashboard.pages.classroom.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'capacity' => 'required|integer',
        ],[
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'capacity.required' => 'The capacity field is required.',
            'capacity.integer' => 'The capacity must be an integer.',
        ]);
        $classroom = new Classroom();
        $classroom->name = $request->name;
        $classroom->description = $request->description;
        $classroom->capacity = $request->capacity;
        $classroom->save();
        

        return redirect()->route('classroom.index')
                        ->with('success','Classroom created successfully.');
    }

    public function edit($id){
        $classroom = Classroom::find($id);
        return view('dashboard.pages.classroom.edit', compact('classroom'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'sometimes|required',
            'description' => 'sometimes|nullable',
            'capacity' => 'sometimes|required|integer',
        ]);

        $classroom = Classroom::find($id);
        $classroom->update($request->all());

        return redirect()->route('classroom.index')
                        ->with('success','Classroom updated successfully');
    }
    public function destroy($id){
        $classroom = Classroom::with('teachers','students')->find($id);
        $studentCount = $classroom->students()->count();
        $teacherCount = $classroom->teachers()->count();
        
        if($studentCount > 0 || $teacherCount > 0){
            $message = 'You cannot delete this classroom because it has ';
            if($studentCount > 0 && $teacherCount > 0) {
                $message .= 'teachers and students';
            } elseif($studentCount > 0) {
                $message .= 'students';
            } else {
                $message .= 'teachers';
            }
            return redirect()->route('classroom.index')
                        ->with('error', $message);
        }
        $classroom->delete();

        return redirect()->route('classroom.index')
                        ->with('success','Classroom deleted successfully');
    }

}
