<?php

namespace App\Models\Services;
use App\Models\Entities\Doctor;

class WorkerService
{
    public function updateDoctorRole($id, $roleId){
        Doctor::where('id', $id)->update(['role_id' => $roleId]);
    }

    public function fireDoctor($id, $reason){
        Doctor::where('id', $id)->update(['is_fired' => 1, 'reason' => $reason]);
    }

    public function deleteUser(){
        Doctor::where('id', $id)->delete();
    }

    public function hireUser(){
        Doctor::where('id', $id)->update(['role_id' => 1, 'is_active' => true]);
    }

    public function restoreDoctor($id){
        Doctor::where('id', $id)->update(['is_fired' => 0]);
    }
}
