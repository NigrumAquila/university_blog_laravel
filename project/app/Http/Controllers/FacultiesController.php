<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Services\FacultiesService;

class FacultiesController extends Controller
{
    public function index()
    {
        return view('faculties.index', ['faculties' => Faculty::all()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  =>  'required|string',
            'abbreviation'  =>  'required|string',
        ]);

        $faculty = Faculty::add($request->all());
        return redirect()->route('faculties.index');
    }

    public function show($id)
    {
        return view('faculties.show', with(new FacultiesService())->showData($id));
    }

    public function edit($id)
    {
        return view('faculties.edit', ['faculty' => Faculty::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  =>  'string',
            'abbreviation'  =>  'string',
        ]);

        $faculty = Faculty::find($id);
        $faculty->edit($request->all());
        return redirect()->route('faculties.index');
    }

    public function showDeleteForm($id)
    {
        return view('faculties.showDeleteForm', ['faculty' => Faculty::findOrFail($id)]);
    }

    public function destroy($id)
    {
        $faculty = Faculty::find($id);
        $faculty->delete();
        return redirect()->route('faculties.index');
    }
}
