@extends('layouts.app')

@section('content')
    <div class="row mx-auto p-0">
        @if(Session::has('message'))
            <div class="col-12 d-flex justify-content-center align-items-center">
                <p>{{Session::get('message')}}</p>
            </div>
        @endif
        <div class="col-12 col-md-6 col-lg-6">
            <form action="{{ route('exam.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">Create Exam</div>
                    <div class="card-body">
                        <div class="row m-0 p-0">

                            <div class="col-6 col-md-6 col-lg-12">
                                <label for="class_room_id">Select Class<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-6 col-md-6 col-lg-12">
                                <select name="class_room_id" id="class_room_id" class="form-control @error('class_room_id') is-invalid @enderror">
                                    <option value="">Select</option>
                                    @foreach($class_rooms as $classRoom)
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
                                <label for="subject_id">Select Subject<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-6 col-md-6 col-lg-12">
                                <select name="subject_id" id="subject_id" class="form-control @error('subject_id') is-invalid @enderror">
                                    <option value="">Select</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>

                                @error('subject_id')
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
                                <label for="duration">Exam Duration <small>(Minute)</small></label>
                            </div>
                            <div class="col-6 col-md-6 col-lg-12">
                                <input type="number" id="duration" name="duration" class="form-control @error('duration') is-invalid @enderror" value="{{ old('duration') }}">
                                @error('duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="col-6 col-md-6 col-lg-12">
                                <label for="marks">Total Marks</label>
                            </div>
                            <div class="col-6 col-md-6 col-lg-12">
                                <input type="text" id="marks" name="marks" class="form-control @error('marks') is-invalid @enderror" value="{{ old('marks') }}" placeholder="Total Marks">
                                @error('marks')
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
                <div class="card-header">Exam List</div>
                <div class="card-body">
                    @if($exams->count() > 0)
                        <table class="table table-bordered table-sm table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Exam Name</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Duration</th>
                                <th>Marks</th>
                                <th>Added By</th>
                                <th>Create</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exams as $exam)
                                <tr>
                                    <td colspan="7">{{ $exam->classList }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $exam->id }}</td>
                                    <td>
                                        <a href="{{ route('exam.show', $exam->id) }}" class="text-decoration-none">{{ $exam->name }}</a>
                                    </td>
                                    <td>{{ $exam->class_room->name }}</td>
                                    <td>{{ $exam->subject->name }}</td>
                                    <td>{{ $exam->duration }} Min</td>
                                    <td>{{ $exam->marks }}</td>
                                    <td>{{ $exam->user->name }}</td>
                                    <td>{{ $exam->created_at }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center font-weight-bold h6 text-danger">No Exam found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
