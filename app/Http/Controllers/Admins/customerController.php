<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Admins; 
use App\Vendors; 
use App\Packages; 
use App\Customers; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Validator;
use Redirect;
use Illuminate\Support\Facades\DB;

class customerController extends Controller
{
    
    public function index()
    {
        $customers = Customers::select('*')->get();
        return view('admins.customers.index', ['customers' => $customers ]); 
    }

    
	
  
}

