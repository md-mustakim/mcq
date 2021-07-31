@extends('layouts.app')

@section('content')
    <div class="row mx-auto p-0">
        @if(Session::has('message'))
            <div class="col-12 d-flex justify-content-center align-items-center">
                <p>{{Session::get('message')}}</p>
            </div>
        @endif
        <div class="col-12 col-md-6 col-lg-6">
            <form action="{{ route('student.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">Add Student</div>
                    <div class="card-body">
                        <div class="row m-0 p-0">

                            <div class="col-6 col-md-6 col-lg-12">
                                <label for="classRoom_id">Select Class<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-6 col-md-6 col-lg-12">
                                <select name="class_room_id" id="class_room_id" class="form-control @error('class_room_id') is-invalid @enderror">
                                    <option value="">Select</option>
                                    @foreach($classRooms as $classRoom)
                                        <option value="{{ $classRoom->id }}">{{ $classRoom->name }}</option>
                                    @endforeach
                                </select>

                                @error('class_room_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



                            <div class="col-6 col-md-6 col-lg-12">
                                <label for="name">Name<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-6 col-md-6 col-lg-12">
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>




                            <div class="col-6 col-md-6 col-lg-12">
                                <label for="roll">Roll</label>
                            </div>
                            <div class="col-6 col-md-6 col-lg-12">
                                <input type="number" id="roll" name="roll" class="form-control @error('roll') is-invalid @enderror" value="{{ old('roll') }}">
                                @error('roll')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="col-6 col-md-6 col-lg-12">
                                <label for="phone">Phone</label>
                            </div>
                            <div class="col-6 col-md-6 col-lg-12">
                                <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



                            <div class="col-12 my-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">Subject List</div>
                <div class="card-body">
                    @if($students->count() > 0)
                        <table class="table table-bordered table-sm table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Class</th>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Phone</th>
                                <th>Time</th>
                                <th>Added By</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td colspan="7">{{ $student->classList }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->class_room->name }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->roll }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ $student->created_at }}</td>
                                    <td>{{ $student->user->name }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a class="btn btn-info mx-1" href="{{ route('subject.edit', $student->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        &middot;
                                        <form action="{{ route('subject.destroy', $student->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mx-1"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center font-weight-bold h6 text-danger">No Student found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
