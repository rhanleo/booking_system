<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Customers; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Validator;
use Redirect;

class dashboardController extends Controller
{


    public function index()
    {
        
		if(Auth::guard('customer')->check())
        {
            dd('yes');
            $admin = Customers::select('name')->first();

            return view('customers.dashboard', ['user' => $admin]);
        } 
        dd('no');
            return view('customers.landing');
    
       
    }
	
  
}

