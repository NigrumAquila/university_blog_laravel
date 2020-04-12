<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;

    public function lecturers()
    {
        return $this->hasMany(Lecturer::class);
    }
}
