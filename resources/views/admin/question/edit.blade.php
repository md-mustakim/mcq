@extends("layouts.app")
@section("content")
<div class="row m-0 p-0">

    <div class="col-md-6 mx-auto p-0">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="h4">Edit Question</div>
                    <form action="{{ route("question.destroy", $question->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            <form action="{{ route('question.update', $question->id) }}" method="POST">
                <div class="card-body">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="exam_id" value="{{ $question->exam_id }}">
                    <div class="">
                        <label for="question" class="h6 font-weight-bold">Write A question</label>
                        <input type="text"
                               class="form-control"
                               name="question"
                               id="question"
                               value="{{ $question->question }}"
                               placeholder="Write a Question">
                    </div>

                    <div class="row py-2">
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            @if($question->correct_option == 'option_a')

                            <input type="radio"
                                   name="correct_option"
                                   id="correct_option_a"
                                   value="option_a"
                                   checked>
                            @else
                            <input type="radio"
                                   name="correct_option"
                                   id="correct_option_a"
                                   value="option_a">
                            @endif

                        </div>
                        <div class="col-3 d-flex justify-content-center align-items-center">
                            <label for="option_a">Option A</label>
                        </div>
                        <div class="col-8">
                            <input type="text"
                                   class="form-control"
                                   value="{{ $question->option_a }}"
                                   name="option_a"
                                   id="option_a">
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            @if($question->correct_option == 'option_b')
                            <input type="radio"
                                   name="correct_option"
                                   id="correct_option_b"
                                   value="option_b"
                                   checked>
                            @else
                            <input type="radio"
                                   name="correct_option"
                                   id="correct_option_b"
                                   value="option_b">
                            @endif

                        </div>
                        <div class="col-3 d-flex justify-content-center align-items-center">
                            <label for="option_b">Option B</label>
                        </div>
                        <div class="col-8">
                            <input type="text"
                                   class="form-control"
                                   value="{{ $question->option_b }}"
                                   name="option_b"
                                   id="option_b">
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            @if($question->correct_option == 'option_c')
                            <input type="radio"
                                   name="correct_option"
                                   id="correct_option_c"
                                   value="option_c"
                                    checked>
                            @else
                            <input type="radio"
                               name="correct_option"
                               id="correct_option_c"
                               value="option_c">
                            @endif
                        </div>
                        <div class="col-3 d-flex justify-content-center align-items-center">
                            <label for="option_c">Option C</label>
                        </div>
                        <div class="col-8">
                            <input type="text"
                                   class="form-control"
                                   value="{{ $question->option_c }}"
                                   name="option_c"
                                   id="option_c">
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            @if($question->correct_option == 'option_d')
                            <input type="radio"
                                   name="correct_option"
                                   id="correct_option_d"
                                   value="option_d"
                                    checked>
                            @else
                            <input type="radio"
                                   name="correct_option"
                                   id="correct_option_d"
                                   value="option_d">
                            @endif
                        </div>
                        <div class="col-3 d-flex justify-content-center align-items-center">
                            <label for="option_d">Option D</label>
                        </div>
                        <div class="col-8">
                            <input type="text"
                                   class="form-control"
                                   value="{{ $question->option_d }}"
                                   name="option_d"
                                   id="option_d">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center align-items-center">
                        <button class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
