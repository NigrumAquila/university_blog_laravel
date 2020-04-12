<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{       
    public $timestamps = false;

    protected $fillable = [
        'surname', 'name', 'patronymic', 'post_id', 'faculty_id',
    ];

    public function groupSubjects()
    {
        return $this->hasMany(GroupSubject::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public static function add($fields)
    {
        $lecturer = new static;
        $lecturer->fill($fields);
        $lecturer->save();

        return $lecturer;
    }

    public function edit($fields)
    {
        $this->fill($fields); 
        $this->save();
    }
}
