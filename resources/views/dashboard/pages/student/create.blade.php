@extends('layouts.dashboard')
@section('title', 'Create Student')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Student</a></li>
    <li class="breadcrumb-item active">Create Student</li>
@endsection
@section('content')
      <x-flash-message />
      <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Student</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('student.store') }}" method="POST">
                @csrf
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
                    <x-form.input id="exampleInputbirth_date" name="birth_date" type="date" label="Date of Birth" :value="$student->birth_date ?? ''" placeholder="Enter date of birth" />
                  </div>
                  <div class="form-group">
                    <x-form.select id="exampleInputClassroom" name="classroom_id" label="Classroom" :options="$classrooms->pluck('name', 'id')->toArray()" :value="$student->classroom_id ?? ''" placeholder="Select classroom" />  
                  
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection
