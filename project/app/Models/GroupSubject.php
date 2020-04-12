<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupSubject extends Model
{
    public $timestamps = false;

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function examMarks()
    {
        return $this->hasMany(ExamMark::class, 'subject_id', 'subject_id');
    }
}
