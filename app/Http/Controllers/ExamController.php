<?php

namespace App\Http\Controllers;

use App\Models\classRoom;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
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
        return view("admin.exam.index", [
            "exams" => Exam::all(),
            "class_rooms" => classRoom::all(),
            "subjects" => Subject::all()
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
            "class_room_id" => "required",
            "subject_id" => "required",
            "name" => "required",
            "duration" => "required",
            "marks" => "required"
        ]);
        $attributes["user_id"] = Auth::id();
        Exam::create($attributes);
        return back()->with("message", "Exam Create Success");
    }

    /**
     * Display the specified resource.
     *
     * @param Exam $exam
     * @return Application|Factory|View
     */
    public function show(Exam $exam)
    {
        return view("admin.exam.show", [
            "exam" => $exam,
            "questions" => Question::all()->where('exam_id', '=', $exam->id)->sortByDesc("id")
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Exam $exam
     * @return Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Exam $exam
     * @return Response
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Exam $exam
     * @return RedirectResponse
     */
    public function destroy(Exam $exam): RedirectResponse
    {
        $exam->delete();
        return redirect()->route("exam.index")->with("message", "Delete Success");
    }
}
