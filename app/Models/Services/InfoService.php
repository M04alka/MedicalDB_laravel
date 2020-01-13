<?php

namespace App\Models\Services;

use App\Models\Entities\Role;
use Illuminate\Support\Facades\DB;

class InfoService
{
    public function getInfoPermission(String $role){
    	$permissions = Role::where('role_name', $role)->select('is_admin')->first();
      	return $permissions;
    } 
}
