<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PillsController extends Controller
{
    public function index(){
    	return view('pages.pills');
    }
}
