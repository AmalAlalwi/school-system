@extends('layouts.dashboard')
@section('title', 'Student')
@section('breadcrumb')
    <li class="breadcrumb-item active">Student</li>
@endsection
@section('content')
      <x-flash-message />
      <div class="card">
         <div class="card-header">
           <a href="{{ route('student.create') }}" class="btn btn-primary float-right mt-3">Create Student</a>
          <form action="{{URL::current()}}" method="GET" class="row g-3 mt-3 mb-3">
            <div class="col-md-4">
              <input type="text" id="name" name="name" class="form-control" placeholder="Search by name" value="{{request('name')}}" />
            </div>
            <div class="col-md-4">
                <select class="form-control" id="classroom_id" name="classroom_id">
                <option value="">Select Classroom</option>
                @foreach($classrooms as $classroom)
                    <option value="{{ $classroom->id }}" {{ request('classroom_id') == $classroom->id ? 'selected' : '' }}>{{ $classroom->name }}</option>
                @endforeach
               </select>
            </div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-primary">Search</button>
              <button type="reset" class="btn btn-primary mx-2" onclick="window.location.href='{{ route('student.index') }}'">Reset</button>
            </div>
          </form>
         
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Date of Birth</th>
              <th>Classroom</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->birth_date }}</td>
                        <td>{{ $student->classroom->name ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          {{ $students->links() }}
        </div>
        <!-- /.card-body -->
      </div>


@endsection