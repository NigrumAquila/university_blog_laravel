<?php 
namespace App\Models\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\Lecturer;
use App\Models\Faculty;
use App\Models\Post;

class FacultiesService
{
    public function showData($id)
    {
        $data = array(
            'lecturers' => Lecturer::join('posts', 'posts.id', '=', 'lecturers.post_id')
            ->select('lecturers.id', 'lecturers.surname', 'lecturers.name', 'lecturers.patronymic', 'posts.name as post_name')
            ->where('lecturers.faculty_id', '=', $id)
            ->orderBy('lecturers.surname', 'ASC')->get(),
            'faculty' => Faculty::findOrFail($id),
            'posts' => Post::all(),
        );

        return $data;
    }
}
