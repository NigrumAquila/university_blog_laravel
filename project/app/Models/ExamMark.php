<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamMark extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'mark_id', 'date',
    ];

    public function groupSubject()
    {
        return $this->belongsTo(GroupSubject::class, 'subject_id', 'subject_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function mark()
    {
        return $this->belongsTo(Mark::class);
    }

    public function edit($fields)
    {
        $this->fill($fields); 
        $this->save();
    }

    public static function determineRange($exam_test)
    {
        $exam = 'экзамен';
        $exam_range = '3,6';
        $offset = 'зачет';
        $offset_range = '1,2';

        if($exam_test == $exam) { return $exam_range; }
        elseif($exam_test == $offset) { return $offset_range; }
    }
}
