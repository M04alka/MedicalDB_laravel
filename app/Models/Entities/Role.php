<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public function doctor(){
    	return $this->hasOne('App\Doctor');
    }

    static function morguePermissions(String $role){
    	return self::where('role_name', $role)->select('add_to_morgue','is_admin')->first();
    }

    static function test(){
    	return self::join(new Doctor)->get();
    }

}
