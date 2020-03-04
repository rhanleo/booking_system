<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Customers; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Validator;
use Redirect;

class customersController extends Controller
{

    public function index()
    {
		if(Auth::guard('customer')->check())
        {
            $admin = Customers::select('name')->first();

            return view('customers.dashboard', ['user' => $admin]);
        }else{                 
            return view('customers.landing');
        }
       
    }
	public function login(Request $request){ 
      
        $data =	[
			'email'	=>	$request->get('email'),
			'password'	=>	$request->get('password')
        ];
       
        if(Auth::guard('customer')->attempt($data)) {
            
            
            if(Auth::guard('customer')->check()){
               
                //return Redirect::route('customer.dashboard');
                $admin = Customers::select('name')->first();
            return view('customers.dashboard', ['user' => $admin]); 
            }
         
            // return Redirect::route('customers.dashboard');
            $admin = Customers::select('name')->first();
            return view('customers.dashboard', ['user' => $admin]); 
        }
      
        return back()->withInput($request->only('email'));
        
    }
    public function create(){ 
		
        return view('customers.register'); 
         
    }
    
    protected function register(Request $request)
    {
        $uuid = (string) Str::uuid();
        $res =  Customers::create([
            'uuid' =>  $uuid ,
            'name' => $request['name'],
            'email' => $request['email'],
            'is_live' => 'Y',
            'password' => Hash::make($request['password']),
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
        if($res){
            
            return view('customers.landing'); 
        }
        return view('customers.register'); 
    }
    public function logout(){
        \Session::flush();
        Auth::logout();
        return view('customers.landing');
    }
  
}

