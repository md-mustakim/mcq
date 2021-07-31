<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Exam</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="">
            @if($class_rooms->count() === 0)
                <p>No class Found</p>
            @else
                <div class="">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <span>
                        @if(Session::has('message'))
                            <p>{{ Session::get('message') }}</p>
                        @endif
                    </span>
                </div>
                <form action="{{ route('student.exam.find') }}" method="POST">
                    @csrf
                    <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                    <select name="class_room_id" id="class_room_id">
                        @foreach($class_rooms as $class_room)
                            <option value="{{ $class_room->id }}">{{ $class_room->name }}</option>
                        @endforeach
                    </select>
                    <div class="">
                        <input type="text" name="phone" id="phone" placeholder="Enter Your Registered Phone Number">
                    </div>
                    <div class="">
                        <input type="number" name="roll" id="roll" placeholder="Enter Your Roll Number">
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </form>
            @endif
        </div>
  </div>
</body>
</html>
