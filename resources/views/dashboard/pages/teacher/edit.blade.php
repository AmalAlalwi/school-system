@extends('layouts.dashboard')
@section('title', 'Edit Teacher')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('teacher.index') }}">Teacher</a></li>
    <li class="breadcrumb-item active">Edit {{ $teacher->name }}</li>
@endsection
@section('content')
      <x-flash-message />
      <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Teacher</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('teacher.update', $teacher->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                     <x-form.input id="exampleInputName" name="name" type="text" label="Name" :value="$teacher->name ?? ''" placeholder="Enter name" />
                  </div>
                  <div class="form-group">
                    <x-form.input id="exampleInputEmail" name="email" type="email" label="Email" :value="$teacher->email ?? ''" placeholder="Enter email" />
                  </div>
                  <div class="form-group">
                    <x-form.input id="exampleInputPhone" name="phone" type="text" label="Phone" :value="$teacher->phone ?? ''" placeholder="Enter phone" />
                  </div>
                  <div class="form-group">
                    <x-form.input id="exampleInputSpecialization" name="specialization" type="text" label="Specialization" :value="$teacher->specialization ?? ''" placeholder="Enter specialization" />
                  </div>
                  <div class="form-group>
                  <x-form.select id="exampleInputClassroom" name="classroom_id" label="Classroom" :options="$classrooms->pluck('name', 'id')->toArray()" :selected="$teacher->classroom_id ?? ''" placeholder="Select classroom" />  
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Edit</button>
                </div>
              </form>
            </div>
@endsection
