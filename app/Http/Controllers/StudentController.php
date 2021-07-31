<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\classRoom;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view("admin.student.index", [
            "students" => Student::all(),
            "classRooms" => classRoom::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'class_room_id' => 'required|min:1',
            'name' => 'required|min:3',
            'roll' => 'required',
            'phone' => 'required|max:11|min:11'
        ]);
        $attributes['user_id'] = Auth::id();
        Student::create($attributes);
        return back()->with('message', 'Student Added Success');
    }

    /**
     * Display the specified resource.
     *
     * @param Student $student
     * @return Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Student $student
     * @return Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Student $student
     * @return Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Student $student
     * @return Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function findView(Exam $exam){
        return view("student.exam.find", [
            "class_rooms" => classRoom::all(),
            "exam" => $exam
        ]);
    }

    public function find(Request $request)
    {
        $request->validate([
            "phone" => "required|min:11|max:11",
            "roll" => "required",
            "class_room_id" => "required",
            "exam_id" => "required"
        ]);
        $result = Student::all()
            ->where("phone", "=", $request->input('phone'))
            ->where("roll", "=", $request->input('roll'))
            ->where("class_room_id", "=", $request->input('class_room_id'));
        if ($result->count() === 0){
            return back()->withInput()->with("message", "Sorry! Not Found");
        }else{
            $questions = Question::all()->where("exam_id", "=", $request->input("exam_id"));
            $question = Question::where("exam_id", "=", $request->input("exam_id"))->first();
            $answerSearch = Answer::all()
                ->where("student_id", "=", $result->id)
                ->where("question_id", "=", $question->id);
            if ($answerSearch->count() === 0){
                return view("student.exam.exam", [
                    "question" => $questions,
                    "student" => $result
                ]);
            }else{
                return back()
                    ->with("message", "Dear ".$result->name.", Your Exam Already Complete! You will receive you result soon");
            }

        }

    }


}
