<?php 
namespace App\Models\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\GroupSubject;
use App\Models\ExamMark;
use App\Models\Mark;

class GroupSubjectsService
{
    const OFFSET = 'зачет';
    const EXAM = 'экзамен';

    public function indexData()
    {
        $data = array(
            'group_subjects' => GroupSubject::join('groups', 'groups.id', '=', 'group_subjects.group_id')
                ->join('subjects', 'subjects.id', '=', 'group_subjects.subject_id')
                ->join('lecturers', 'lecturers.id', '=', 'group_subjects.lecturer_id')
                ->select('group_subjects.id', 'group_subjects.exam_test', 'groups.name as group_name', 'subjects.name as subject_name', 'lecturers.surname', 'lecturers.name', 'lecturers.patronymic')
                ->where('groups.name','LIKE','%'.Input::get('group').'%')
                ->where('subjects.name','LIKE','%'.Input::get('subject').'%')
                ->where('lecturers.surname','LIKE','%'.Input::get('surname').'%')
                ->where('lecturers.name','LIKE','%'.Input::get('name').'%')
                ->where('lecturers.patronymic','LIKE','%'.Input::get('patronymic').'%')
                ->where('group_subjects.exam_test','LIKE','%'.Input::get('exam_test').'%')
                ->orderBy('lecturers.surname', 'ASC')->get(),
        );

        return $data;
    }

    public function showData($id)
    {
        $data = array(
            'group_subjects' => GroupSubject::join('groups', 'groups.id', '=', 'group_subjects.group_id')
                ->join('subjects', 'subjects.id', '=', 'group_subjects.subject_id')
                ->join('lecturers', 'lecturers.id', '=', 'group_subjects.lecturer_id')
                ->select('group_subjects.id', 'group_subjects.exam_test', 'groups.name as group_name', 'subjects.name as subject_name', 'lecturers.surname', 'lecturers.name', 'lecturers.patronymic')
                ->where('group_subjects.id', '=', $id)
                ->first(),
            'students' => ExamMark::join('students', 'students.id', '=', 'exam_marks.student_id')
                ->join('marks', 'marks.id', '=', 'exam_marks.mark_id')
                ->select('exam_marks.id', 'exam_marks.date', 'students.number', 'students.surname', 'students.name', 'students.patronymic', 'marks.name as mark_name')
                ->where('exam_marks.subject_id', '=', $id)
                ->orderBy('students.surname', 'students.name', 'students.patronymic', 'ASC')
                ->get(),
        );

        return $data;
    }

    public function editData($id)
    {
        $data = array(
            'marks' => Mark::all(),
            'group_subjects' => GroupSubject::join('groups', 'groups.id', '=', 'group_subjects.group_id')
                ->join('subjects', 'subjects.id', '=', 'group_subjects.subject_id')
                ->join('lecturers', 'lecturers.id', '=', 'group_subjects.lecturer_id')
                ->select('group_subjects.id', 'group_subjects.exam_test', 'groups.name as group_name', 'subjects.name as subject_name', 'lecturers.surname', 'lecturers.name', 'lecturers.patronymic')
                ->where('group_subjects.id', '=', $id)
                ->first(),
            'students' => ExamMark::join('students', 'students.id', '=', 'exam_marks.student_id')
                ->join('marks', 'marks.id', '=', 'exam_marks.mark_id')
                ->select('exam_marks.id', 'exam_marks.date', 'students.number', 'students.surname', 'students.name', 'students.patronymic', 'marks.name as mark_name')
                ->where('exam_marks.subject_id', '=', $id)
                ->orderBy('students.surname', 'students.name', 'students.patronymic', 'ASC')
                ->get(),
        );

        $data['marks'] = $this->slice($data);
        
        return $data;
    }

    protected function slice($data)
    {
        $test_form = $data['group_subjects']['exam_test'];

        if($test_form == self::OFFSET) 
        {
            return $data['marks']->except([3,4,5,6]);
        }
        elseif($test_form == self::EXAM)
        {
            return $data['marks']->except([1,2]);
        }
    }
}
