<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
    
    public static function boot() {
        parent::boot();

        static::deleting(function($group) {
             $group->students()->delete();
        });
    }
    
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public static function add($fields)
    {
        $group = new static;
        $group->fill($fields);
        $group->save();

        return $group;
    }

    public function edit($fields)
    {
        $this->fill($fields); 
        $this->save();
    }
}
