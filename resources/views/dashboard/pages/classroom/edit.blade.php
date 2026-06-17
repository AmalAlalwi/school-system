@extends('layouts.dashboard')
@section('title', 'Edit Classroom')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('classroom.index') }}">Classroom</a></li>
    <li class="breadcrumb-item active">Edit {{ $classroom->name }}</li>
@endsection
@section('content')
      <x-flash-message />
      <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Classroom</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('classroom.update', $classroom->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                     <x-form.input id="exampleInputName" name="name" type="text" label="Name" :value="$classroom->name ?? ''" placeholder="Enter name" />
                  </div>
                  <div class="form-group">
                    <x-form.textarea id="exampleInputDescription" name="description" label="Description" :value="$classroom->description ?? ''" placeholder="Enter description" />
                  </div>
                  <div class="form-group">
                    <x-form.input id="exampleInputCapacity" name="capacity" type="number" label="Capacity" :value="$classroom->capacity ?? ''" placeholder="Enter capacity" />
                  </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Edit</button>
                </div>
              </form>
            </div>
@endsection
