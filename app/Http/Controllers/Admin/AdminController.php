<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	/*
	 * The main application page 
	 */
    public function dashboard()
    {
    	$data = [];
        return view('admin.dashboard', $data);
    }
    
}
