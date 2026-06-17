@extends('layouts.dashboard')
@section('title', 'Teacher')
@section('breadcrumb')
    <li class="breadcrumb-item active">Teacher</li>
@endsection
@section('content')
      <x-flash-message />
      <div class="card">
         <div class="card-header">
           <a href="{{ route('teacher.create') }}" class="btn btn-primary float-right mt-3">Create Teacher</a>
          <form action="{{URL::current()}}" method="GET" class="row g-3 mt-3 mb-3">
            <div class="col-md-3">
              <input type="text" id="name" name="name" class="form-control" placeholder="Search by name" value="{{request('name')}}" />
            </div>
            <div class="col-md-3">
              <input type="text" id="specialization" name="specialization" class="form-control" placeholder="Search by specialization" value="{{request('specialization')}}" />
            </div>
            <div class="col-md-2">
               <select class="form-control" id="classroom_id" name="classroom_id">
                <option value="">Select Classroom</option>
                @foreach($classrooms as $classroom)
                    <option value="{{ $classroom->id }}" {{ request('classroom_id') == $classroom->id ? 'selected' : '' }}>{{ $classroom->name }}</option>
                @endforeach
               </select>
            </div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-primary">Search</button>
              <button type="reset" class="btn btn-primary mx-2" onclick="window.location.href='{{ route('teacher.index') }}'">Reset</button>
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
              <th>Specialization</th>
              <th>Classroom</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->phone }}</td>
                        <td>{{ $teacher->specialization }}</td>
                        <td>{{ $teacher->classroom->name ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No teachers found.</td>
                    </tr>
                @endforelse
                   
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>


@endsection