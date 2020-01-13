<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\WorkerService;
use App\Models\Services\RoleService;
use App\Models\Services\DoctorService;

class WorkerController extends Controller
{
    public function index(){
    	$role = new RoleService();
    	$doctor = new DoctorService();
    	$newUsers = $doctor->getListOfNewUsers();
    	$fireDoctors = $doctor->getListOfFiredDoctros();
    	$doctors = $doctor->getListOfDoctors();
    	$roles = $role->getRoleList();
    	return view('pages.workers',compact('doctors','roles','newUsers','fireDoctors'));
    }

    public function delete($id){
    	$worker = new WorkerService();
    	$worker->deleteUser($id);
    	return redirect('/workers');
    }

    public function update($id){
    	$worker = new WorkerService();
    	$worker->hireUser($id);
    	return redirect('/workers');
    }

    public function fireWorker(Request $request, $id){
    	$worker = new WorkerService();
    	$worker->fireDoctor($id, $request->input('reason'));
    	return redirect('/workers');
    }

    public function updateRole(Request $request, $id){
    	$worker = new WorkerService();
    	$worker->updateDoctorRole($id, $request->input('role_id'));
    	return redirect('/workers');
    }

    public function restoreWorker($id){
    	$worker = new WorkerService();
    	$worker->restoreDoctor($id);
    	return redirect('/workers');
    }    
}
