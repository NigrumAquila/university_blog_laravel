<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    public $timestamps = false;

    public function examMarks()
    {
        return $this->hasMany(ExamMark::class);
    }
}
