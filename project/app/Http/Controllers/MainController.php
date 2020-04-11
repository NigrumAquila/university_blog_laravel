<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\ResultService;
use App\Models\Subject;

class MainController extends Controller
{
    public function index()
    {
        return view('main.index', with(new \App\Models\Services\GroupSubjectsService())->indexData());
    }

    public function subjects()
    {
        return view('main.subjects', ['subjects' => Subject::orderBy('name', 'ASC')->get()]);
    }

    public function results()
    {
        return view('main.results', with(new ResultService())->resultData());
    }
}
