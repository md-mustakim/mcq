@extends('layouts.app')

@section('content')
    <div class="row mx-auto p-0 container">
        @if(Session::has('message'))
            <div class="col-12 d-flex justify-content-center align-items-center">
                <p>{{Session::get('message')}}</p>
            </div>
        @endif
        <div class="col-12 col-md-6 col-lg-6">
            <form action="{{ route('subject.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">Add Subject</div>
                    <div class="card-body">
                        <div class="row m-0 p-0">
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
                                <label for="details">Details</label>
                            </div>
                            <div class="col-6 col-md-6 col-lg-12">
                                <input type="text" id="details" name="details" class="form-control @error('details') is-invalid @enderror" value="{{ old('details') }}">
                                @error('details')
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
                    @if($subjects->count() > 0)
                        <table class="table table-bordered table-sm table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <td>{{ $subject->id }}</td>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ Carbon\Carbon::parse($subject->created_at)->diffForHumans() }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a class="btn btn-info mx-1" href="{{ route('subject.edit', $subject->id) }}">Edit</a>
                                        &middot;
                                        <form action="{{ route('subject.destroy', $subject->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mx-1">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center font-weight-bold h6 text-danger">No Subject found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
