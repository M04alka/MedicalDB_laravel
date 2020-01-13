<?php

namespace App\Models\Services;

use App\Models\Entities\Role;

class RoleService
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

    public function getRoleList(){
       return Role::where('role_name','!=','Новый пользователь')->get();
    }

}
