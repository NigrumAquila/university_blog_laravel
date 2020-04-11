<?php 
namespace App\Models\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\Lecturer;
use App\Models\Post;

class LecturersService
{
    public function indexData()
    {
        $data = array(
            'lecturers' => Lecturer::join('posts', 'posts.id', '=', 'lecturers.post_id')
                ->join('faculties', 'faculties.id', '=', 'lecturers.faculty_id')
                ->select('lecturers.id', 'lecturers.surname', 'lecturers.name', 'lecturers.patronymic', 'posts.name as post_name', 'faculties.abbreviation')
                ->whereColumn('posts.id', 'lecturers.post_id')
                ->where('lecturers.surname','LIKE','%'.Input::get('surname').'%')
                ->where('lecturers.name','LIKE','%'.Input::get('name').'%')
                ->where('lecturers.patronymic','LIKE','%'.Input::get('patronymic').'%')
                ->where('posts.name','LIKE','%'.Input::get('post').'%')
                ->where('faculties.name','LIKE','%'.Input::get('faculty').'%')
                ->orderBy('lecturers.surname', 'ASC')->get(),
        );

        return $data;
    }

    public function editData($id)
    {
        $data = array(
            'lecturer' => Lecturer::join('faculties', 'faculties.id', '=', 'lecturers.faculty_id')
                ->select('lecturers.id', 'lecturers.surname', 'lecturers.name', 'lecturers.patronymic', 'lecturers.post_id', 'lecturers.faculty_id', 'faculties.name as faculty_name')
                ->where('lecturers.id', '=', $id)->first(),
            'posts' => Post::orderBy('name', 'ASC')->get(),
        );

        return $data;
    }

    public function showData($id)
    {
        $data = array(
            'lecturer' => Lecturer::join('faculties', 'faculties.id', '=', 'lecturers.faculty_id')
                ->join('posts', 'posts.id', '=', 'lecturers.post_id')
                ->select('lecturers.id', 'lecturers.surname', 'lecturers.name', 'lecturers.patronymic', 'posts.name as post_name', 'lecturers.faculty_id', 'faculties.name as faculty_name')
                ->where('lecturers.id', '=', $id)->first(),
        );

        return $data;
    }
}
