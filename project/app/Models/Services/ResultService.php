<?php 
namespace App\Models\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Group;
use App\Models\GroupSubject;

class ResultService
{
    public static function resultData()
    {
        $data = array(
            'groups' => Group::join('group_subjects', 'groups.id', '=', 'group_subjects.group_id')
            ->select('groups.name', 
                'group_subjects.exam_test', 
                DB::raw('count(group_subjects.id) as count_subject'), 
                DB::raw('IF (group_subjects.exam_test = 1, 5*count(*), count(*)) AS Max_Ball'))
            ->groupBy('groups.name', 'group_subjects.exam_test')
            ->orderBy('groups.name', 'ASC', 'group_subjects.exam_test', 'ASC')
            ->get(),
            
            'students' => GroupSubject::join('exam_marks', 'group_subjects.id', '=', 'exam_marks.group_subjects_id')
            ->join('groups', 'groups.id', '=', 'group_subjects.group_id')
            ->join('students', 'students.id', '=', 'exam_marks.student_id')
            ->join('marks', 'marks.id', '=', 'exam_marks.mark_id')
            ->select('groups.id as group_id', 'groups.name as group_name',
            DB::raw('CONCAT(students.surname, \' \', left(students.name, 1), \'.\', left(students.patronymic, 1), \'.\') AS student'),
            'students.number','group_subjects.exam_test', DB::raw('count(exam_marks.mark_id) AS count_mark, 
            min(marks.value) AS min_mark, sum(marks.value) AS sum_mark'))
            ->groupBy('group_subjects.group_id', 'exam_marks.student_id', 'groups.id', 'groups.name', 
            'students.surname', 'students.name', 'students.patronymic', 'students.number', 'group_subjects.exam_test')
            ->get(),
        );

        for($i = 0; $i < count($data['students']); $i++) 
        {
            $data['students'][$i]->total = (($data['students'][$i]->exam_test == 'экзамен' AND $data['students'][$i]->min_mark > 2) 
                OR ($data['students'][$i]->exam_test == 'зачет' AND $data['students'][$i]->min_mark > 0)) ? 'да' : 'нет';
        }
        

        for($i = 0; $i < count($data['students']); $i++)
        {
            $group_iterator = ($data['students'][$i]->exam_test == 'экзамен') 
                ? $data['students'][$i]->group_id * 2 - 2 
                : $data['students'][$i]->group_id * 2 - 1;

            if(!empty($data['students'][$i+1]) AND $data['students'][$i]->student == $data['students'][$i+1]->student) 
            {
                if($data['students'][$i]->total == 'да' AND $data['students'][$i+1]->total == 'да') 
                {
                    if($data['students'][$i]->sum_mark + $data['students'][$i+1]->sum_mark == $data['groups'][$group_iterator]->Max_Ball + $data['groups'][$group_iterator+1]->Max_Ball) 
                    {
                        $data['students'][$i]->grant = '200';
                        $data['students'][$i+1]->grant = '200';
                    }
                    elseif($data['students'][$i]->sum_mark + $data['students'][$i+1]->sum_mark == $data['groups'][$group_iterator]->Max_Ball + $data['groups'][$group_iterator+1]->Max_Ball - 1) 
                    {
                        $data['students'][$i]->grant = '150';
                        $data['students'][$i+1]->grant = '150';
                    }
                    elseif($data['students'][$i]->min_mark > 3) 
                    {
                        $data['students'][$i]->grant = '100';
                        $data['students'][$i+1]->grant = '100';
                    }
                }
                
                else 
                {
                    $data['students'][$i]->grant = '0';
                    $data['students'][$i+1]->grant = '0';
                }
                $i++;
            }
            
            elseif($data['students'][$i]->total == 'да' AND ($data['students'][$i]->min_mark > 3 AND $data['students'][$i]->exam_test == 'экзамен') OR (($data['students'][$i]->min_mark > 0 AND $data['students'][$i]->exam_test == 'зачет')))
            {
                $data['students'][$i]->grant = '100';
            }
            else
            {
                $data['students'][$i]->grant = '0';
            }
        }

        return $data;
    }
}
