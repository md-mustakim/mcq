@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center mb-4" style="border-bottom: 2px solid black">
            <h1 class="font-weight-bold">{{ $exam->name }}</h1>
            <h5>Subject: {{ $exam->subject->name }}</h5>
            <h5>Class: {{ $exam->class_room->name }}</h5>
            <div class="d-flex justify-content-between my-2">
                <div class="font-weight-bold">Time: {{ $exam->duration }}</div>
                <div class="font-weight-bold">Marks: {{ $exam->marks }}</div>
            </div>
        </div>
        <div class="row m-0 p-0">
           <div class="col-md-6 m-0 p-0">
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
                   <form action="{{ route('question.store') }}" method="POST">
                   <div class="card-header">Add Question</div>
                   <div class="card-body">
                           @csrf
                           <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                           <div class="">
                               <label for="question" class="h6 font-weight-bold">Write A question</label>
                               <input type="text"
                                      class="form-control"
                                      name="question"
                                      id="question"
                                      placeholder="Write a Question">
                           </div>

                           <div class="row py-2">
                               <div class="col-1 d-flex justify-content-center align-items-center">
                                   <input type="radio"
                                          name="correct_option"
                                          id="correct_option_a"
                                          value="option_a">
                               </div>
                               <div class="col-3 d-flex justify-content-center align-items-center">
                                   <label for="option_a">Option A</label>
                               </div>
                               <div class="col-8">
                                   <input type="text"
                                          class="form-control"
                                          name="option_a"
                                          id="option_a">
                               </div>
                           </div>

                           <div class="row py-2">
                               <div class="col-1 d-flex justify-content-center align-items-center">
                                   <input type="radio"
                                          name="correct_option"
                                          id="correct_option_b"
                                          value="option_b">
                               </div>
                               <div class="col-3 d-flex justify-content-center align-items-center">
                                   <label for="option_b">Option B</label>
                               </div>
                               <div class="col-8">
                                   <input type="text"
                                          class="form-control"
                                          name="option_b"
                                          id="option_b">
                               </div>
                           </div>

                           <div class="row py-2">
                               <div class="col-1 d-flex justify-content-center align-items-center">
                                   <input type="radio"
                                          name="correct_option"
                                          id="correct_option_c"
                                          value="option_c">
                               </div>
                               <div class="col-3 d-flex justify-content-center align-items-center">
                                   <label for="option_c">Option C</label>
                               </div>
                               <div class="col-8">
                                   <input type="text"
                                          class="form-control"
                                          name="option_c"
                                          id="option_c">
                               </div>
                           </div>

                           <div class="row py-2">
                               <div class="col-1 d-flex justify-content-center align-items-center">
                                   <input type="radio"
                                          name="correct_option"
                                          id="correct_option_d"
                                          value="option_d">
                               </div>
                               <div class="col-3 d-flex justify-content-center align-items-center">
                                   <label for="option_d">Option D</label>
                               </div>
                               <div class="col-8">
                                   <input type="text"
                                          class="form-control"
                                          name="option_d"
                                          id="option_d">
                               </div>
                           </div>
                   </div>
                   <div class="card-footer">
                       <div class="d-flex justify-content-center align-items-center">
                           <button class="btn btn-success">Save</button>
                       </div>
                   </div>
                   </form>
               </div>
           </div>

            <div class="col-md-6">
               @if($questions->count() > 0)
                   <p>Total Question : <span class="badge badge-success">{{ $questions->count() }}</span> </p>
                   <table class="table table-sm table-hover table-borderless">
                       @foreach($questions as $key => $question)
                           <tr>
                               <td rowspan="3">{{ $key + 1 }}</td>
                               <td class="font-weight-bold">
                                   <a href="{{ route("question.edit", $question->id) }}"
                                      class="text-decoration-none">
                                       {{ $question->question }}
                                   </a>
                               </td>
                               <td class="text-right"><u>Ans:</u> <i>{{ $question->{$question->correct_option} }}</i></td>
                           </tr>
                           <tr>
                               <td><b>(A)</b> {{ $question->option_a }}</td>
                               <td><b>(B)</b> {{ $question->option_b }}</td>
                           </tr>
                           <tr>
                               <td><b>(C)</b> {{ $question->option_c }}</td>
                               <td><b>(D)</b> {{ $question->option_d }}</td>
                           </tr>
                       @endforeach
                   </table>
                @else
                <p>No Question added</p>
                @endif
            </div>
        </div>
    </div>
@endsection
