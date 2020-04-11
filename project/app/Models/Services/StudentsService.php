<?php 
namespace App\Models\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\Student;
use App\Models\Group;

class StudentsService
{
    public function indexData()
    {
        $data = array(
            'students' => Student::join('groups', 'groups.id', '=', 'students.group_id')
                ->select('students.id', 'groups.name as group_name', 'students.number', 'students.surname', 'students.name', 'students.patronymic', 'students.gender', 'students.birthday')
                ->where('groups.name', 'LIKE','%'.Input::get('group').'%')
                ->where('students.number', 'LIKE','%'.Input::get('number').'%')
                ->where('students.surname','LIKE','%'.Input::get('surname').'%')
                ->where('students.name','LIKE','%'.Input::get('name').'%')
                ->where('students.patronymic','LIKE','%'.Input::get('patronymic').'%')
                ->where('students.gender','LIKE','%'.Input::get('gender').'%')
                ->where('students.birthday','LIKE','%'.Input::get('birthday').'%')
                ->orderBy('groups.name', 'ASC')->get(),
        );

        return $data;
    }

    public function editData($id)
    {
        $data = array(
            'student' => Student::join('groups', 'groups.id', '=', 'students.group_id')
                ->select('students.id', 'students.group_id', 'students.number', 'students.surname', 'students.name', 'students.patronymic', 'students.gender', 'students.birthday', 'groups.name as group_name')
                ->where('students.id', '=', $id)
                ->first(),
            'groups' => Group::all(),
            'genders' => (new Student)->getGenderList(),
        );

        return $data;
    }

    public function showData($id)
    {
        $data = array(
            'student' => Student::join('groups', 'groups.id', '=', 'students.group_id')
            ->select('students.id', 'students.group_id', 'students.number', 'students.surname', 'students.name', 'students.patronymic', 'students.gender', 'students.birthday', 'groups.name as group_name')
            ->where('students.id', '=', $id)
            ->first(),
        );

        return $data;
    }

}
