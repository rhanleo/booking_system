<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Admins; 
use App\Vendors;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Validator;
use Redirect;

class adminController extends Controller
{
    
  

    public function index()
    { 
		if(Auth::guard('admin')->check())
        { 
            return Redirect::route('admin.dashboard');
        }else{
                                   
            return view('admins.landing');
        }
       
    }
	public function login(Request $request){ 
      
        $data =	[
			'email'	=>	$request->get('email'),
			'password'	=>	$request->get('password')
        ];
       
        if(Auth::guard('admin')->attempt($data)) {             
            return Redirect::route('admin.dashboard');
            // $admin = Auth::user();
            // $vendors = Vendors::select("*")->get();
            // // dd($vendor);
            // return view('admins.dashboard', ['user' => $admin, 'vendors'=>  $vendors]); 
   
        }
      
        return back()->withInput($request->only('email'));
        
    }
    public function create(){ 
		
        return view('admins.register'); 
         
    }
    
    protected function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $id =  Admins::all();
        $uuid = (string) Str::uuid();
        $res =  Admins::create([
            'uuid' =>  $uuid ,
            'id'   => count($id) +1,
            'name' => $request['name'],
            'email' => $request['email'],
            'api_token' => Str::random(60),
            'is_live' => 'Y',
            'password' => Hash::make($request['password']),
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
        if($res){
            $data = [
                'msg' => 'Successfully Created!',
            ];
            return view('admins.landing'); 
        }
        return view('admins.register'); 
    }
    public function logout(){
        \Session::flush();
        Auth::logout();
        return view('admins.landing');
    }
  
}

