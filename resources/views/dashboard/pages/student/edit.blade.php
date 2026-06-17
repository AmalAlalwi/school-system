@extends('layouts.dashboard')
@section('title', 'Edit Student')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Student</a></li>
    <li class="breadcrumb-item active">Edit {{ $student->name }}</li>
@endsection
@section('content')
      <x-flash-message />
      <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Student</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('student.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                     <x-form.input id="exampleInputName" name="name" type="text" label="Name" :value="$student->name ?? ''" placeholder="Enter name" />
                  </div>
                  <div class="form-group">
                    <x-form.input id="exampleInputEmail" name="email" type="email" label="Email" :value="$student->email ?? ''" placeholder="Enter email" />
                  </div>
                  <div class="form-group">
                    <x-form.input id="exampleInputPhone" name="phone" type="text" label="Phone" :value="$student->phone ?? ''" placeholder="Enter phone" />
                  </div>
                  <div class="form-group">
                    <x-form.input id="exampleInputBirthDate" name="birth_date" type="date" label="Date of Birth" :value="$student->birth_date ?? ''" placeholder="Enter date of birth" />
                  </div>
                  <div class="form-group">
                    <x-form.select id="exampleInputClassroom" name="classroom_id" label="Classroom" :options="$classrooms->pluck('name', 'id')->toArray()" :selected="$student->classroom_id ?? ''" placeholder="Select classroom" />  
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Edit</button>
                </div>
              </form>
            </div>
@endsection
