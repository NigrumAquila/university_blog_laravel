<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\StudentsService;
use App\Models\Student;

class StudentsController extends Controller
{
    public function index()
    {
        return view('students.index', with(new StudentsService())->indexData());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'group_id' => 'required|integer',
            'number'  =>  'required|integer|unique:students',
            'surname'  =>  'required|string',
            'name'  =>  'required|string',
            'patronymic'  =>  'required|string',
            'gender'  =>  'required|string|in:м,ж',
            'birthday'  =>  'required|date',
        ]);
        $student = Student::add($request->all());

        return redirect()->route('groups.show', $request->group_id);
    }

    public function show($id)
    {
        return view('students.show', with(new StudentsService())->showData($id));
    }

    public function edit($id)
    {
        return view('students.edit', with(new StudentsService())->editData($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'group_id' => 'integer',
            'number'  =>  'integer',
            'surname'  =>  'string',
            'name'  =>  'string',
            'patronymic'  =>  'string',
            'gender'  =>  'string|in:м,ж',
            'birthday'  =>  'date',
            'page_id' => 'integer',
        ]);
        
        $student = Student::find($id);
        $student->edit($request->all());
        return redirect()->route('groups.show', $request->page_id);
    }

    public function destroy(Request $request, $id)
    {
        Student::find($id)->delete();
        return redirect()->route('groups.show', $request->group_id);
    }
}
