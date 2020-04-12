<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $timestamps = false;

    public function groupSubjects()
    {
        return $this->hasMany(GroupSubject::class);
    }
}
