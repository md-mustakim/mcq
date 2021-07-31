@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="">
            <form action="{{ route('classRoom.update', $classRoom->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="card">
                    <div class="card-header">Edit Class</div>
                    <div class="card-body">
                        <div class="row m-0 p-0">
                            <div class="col-6 col-md-6 col-lg-12">
                                <label for="name">Name<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-6 col-md-6 col-lg-12">
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $classRoom->name }}">
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
                                <input type="text" id="details" name="details" class="form-control @error('details') is-invalid @enderror" value="{{ $classRoom->details }}">
                                @error('details')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12 my-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
