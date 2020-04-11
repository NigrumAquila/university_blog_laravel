<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{       
    public $timestamps = false;

    protected $fillable = [
        'surname', 'name', 'patronymic', 'post_id', 'faculty_id',
    ];

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
