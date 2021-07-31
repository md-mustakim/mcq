<?php

namespace App\Http\Controllers;

use App\Models\classRoom;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClassRoomController extends Controller
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
        return  view('admin.classRoom.index', ['classRooms' => classRoom::all()]);
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
        classRoom::create($attributes);
        return back()->with('message', 'Class Create Success');
    }

    /**
     * Display the specified resource.
     *
     * @param classRoom $classRoom
     * @return Response
     */
    public function show(classRoom $classRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param classRoom $classRoom
     * @return Application|Factory|View
     */
    public function edit(classRoom $classRoom)
    {
        return view('admin.classRoom.edit', ['classRoom' => $classRoom]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param classRoom $classRoom
     * @return RedirectResponse
     */
    public function update(Request $request, classRoom $classRoom): RedirectResponse
    {
        $attributes = $request->validate([
            'name' => 'required|min:3',
            'details' => 'nullable'
        ]);
        $classRoom->update($attributes);
        return redirect()->route('classRoom.index')->with('message', 'Class Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param classRoom $classRoom
     * @return RedirectResponse
     */
    public function destroy(classRoom $classRoom): RedirectResponse
    {
        $classRoom->delete();
        return redirect()->route('classRoom.index');
    }
}
