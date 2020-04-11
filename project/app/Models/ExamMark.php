<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamMark extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'mark_id', 'date',
    ];

    public function edit($fields)
    {
        $this->fill($fields); 
        $this->save();
    }
}
