<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\GroupSubjectsService;
use App\Models\ExamMark;
use App\Models\GroupSubject;

class GroupSubjectsController extends Controller
{
    public function index()
    {
        return view('group_subjects.index', with(new GroupSubjectsService())->indexData());
    }

    public function show($id)
    {
        return view('group_subjects.show', with(new GroupSubjectsService())->showData($id));
    }

    public function edit($id)
    {
        return view('group_subjects.edit', with(new GroupSubjectsService())->editData($id));
    }

    public function update(Request $request, $id)
    {
        $range = ExamMark::determineRange($request->exam_test);
        $this->validate($request, [
            'mark_id'  =>  "integer|between:$range",
            'date' => 'date',
            'exam_test' => 'string|in:экзамен,зачет'
        ]);

        $mark = ExamMark::find($id);
        $mark->edit($request->all());
        return redirect()->back();
    }
}
