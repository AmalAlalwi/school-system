@extends('layouts.dashboard')
@section('title', 'Classroom')
@section('breadcrumb')
    <li class="breadcrumb-item active">Classroom</li>
@endsection
@section('content')
      <x-flash-message />
      <div class="card">
        <div class="card-header">
           <a href="{{ route('classroom.create') }}" class="btn btn-primary float-right mt-3">Create Classroom</a>
           <form action="{{URL::current()}}" method="GET" class="row g-3 mt-3 mb-3">
            <div class="col-md-4">
              <input type="text" id="name" name="name" class="form-control" placeholder="Search by name" value="{{request('name')}}" />
            </div>
            <div class="col-md-4">
               <input type="text" id="capacity" name="capacity" class="form-control" placeholder="Search by capacity" value="{{request('capacity')}}" />
            </div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-primary">Search</button>
              <button type="reset" class="btn btn-primary mx-2" onclick="window.location.href='{{ route('classroom.index') }}'">Reset</button>
            </div>
          </form>
         
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Capacity</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($classrooms as $classroom)
                    <tr>
                        <td>{{ $classroom->name }}</td>
                        <td>{{ $classroom->capacity }}</td>
                        <td>{{ $classroom->description }}</td>
                        <td>
                            <a href="{{ route('classroom.edit', $classroom->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('classroom.destroy', $classroom->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No classrooms found.</td>
                    </tr>
                @endforelse
            </tbody>
          </table>
          {{ $classrooms->links() }}
        </div>
        <!-- /.card-body -->
      </div>
@endsection