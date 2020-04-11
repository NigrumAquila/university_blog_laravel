<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\EnumValue;

class Student extends Model
{
    use EnumValue;

    public $timestamps = false;

    protected $fillable = [
        'group_id', 'number', 'surname', 'name', 'patronymic', 'gender', 'birthday',
    ];

    public static function add($fields)
    {
        $student = new static;
        $student->fill($fields);
        $student->save();

        return $student;
    }

    public function edit($fields)
    {
        $this->fill($fields); 
        $this->save();
    }

    public function getGenderList()
    {
        return $this->getEnumValues()['gender'];
    }
}
