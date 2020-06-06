<?php

namespace App\Models\Services;

use App\Models\Entities\Role;

class HospitalService
{
    public function getHospitalPagePermission(String $role){
		$permissions = Role::where('role_name', $role)->select('add_to_income','is_admin')->first();
      	return $permissions;
    }
}
