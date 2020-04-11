<?php 
namespace App\Models\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Group;
use App\Models\Student;

class GroupsService
{
    public function showData($id)
    {
        $data = array(
            'group' => Group::findOrFail($id), 
            'students' => Student::where('group_id', '=', $id)
                ->orderBy('number', 'ASC')
                ->get(),
            'genders' => (new Student)->getGenderList(),
        );

        return $data;
    }
    
}
