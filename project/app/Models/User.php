<?php

namespace App\Models;

use \Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\EnumValue;

class User extends Authenticatable
{
    use Notifiable;
    use EnumValue;
 
    const ADMIN = 'admin';
    const MODER = 'manager';

    public $timestamps = false;

    protected $fillable = [
        'name', 'rights', 'is_admin', 'is_moder',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public static function add($fields)
    {
        $user = new static;
        $fields = $user->fillRights($fields);
        $user->fill($fields);
        $user->save();

        return $user;
    }

    public function edit($fields)
    {
        $fields = $this->fillRights($fields);
        $this->fill($fields); 
        $this->save();
    }

    public function generatePassword($password)
    {
        if($password != null)
        {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    protected function fillRights($fields)
    {
        $rights = $fields['rights'];

        if($rights == self::ADMIN)
        {
            $fields['is_admin'] = true;
            $fields['is_moder'] = true;
        }
        elseif($rights == self::MODER)
        {
            $fields['is_moder'] = true;
        }
        
        return $fields;
    }

    public function getRightsList()
    {
        return $this->getEnumValues()['rights'];
    }

}
