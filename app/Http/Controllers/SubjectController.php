<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubjectController extends Controller
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
        return view('admin.subject.index', ['subjects' => Subject::all()]);
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
            'name' => 'required|min:3',
            'details' => 'nullable'
        ]);
        Subject::create($attributes);
        return back()->with('message', 'Subject Added Success');
    }

    /**
     * Display the specified resource.
     *
     * @param Subject $subject
     * @return Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Subject $subject
     * @return Application|Factory|View
     */
    public function edit(Subject $subject)
    {
        return view('admin.subject.edit', ['subject' => $subject]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Subject $subject
     * @return RedirectResponse
     */
    public function update(Request $request, Subject $subject): RedirectResponse
    {
        $attributes = $request->validate([
            'name' => 'required|min:3',
            'details' => 'nullable'
        ]);
        $subject->update($attributes);
        return redirect()->route('subject.index')->with('message', 'Subject Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subject $subject
     * @return RedirectResponse
     */
    public function destroy(Subject $subject): RedirectResponse
    {
        $subject->delete();
        return back()->with('message', 'Delete Success');
    }
}
