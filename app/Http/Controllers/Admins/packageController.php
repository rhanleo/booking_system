<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Admins; 
use App\Vendors; 
use App\Packages; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Validator;
use Redirect;
use Illuminate\Support\Facades\DB;

class packageController extends Controller
{
    public static $vendor;
    public static $user;

    public function index()
    {
		if(Auth::guard('admin')->check())
        {
            return view('admins.dashboard', ['user' => Self::get_user() , 'vendors'=>  Self::get_vendor() ]); 
        } 
            return view('admins.landing');
    
       
    }

    public function create()
    { 
        $vendors = Vendors::select("*")->get();
        return view('admins.packages.create', ['user' => Self::get_user() , 'vendors'=>  $vendors]); 
    }

    public function add(Request $request)
    { 
        $uuid = (string) Str::uuid();
        $res =  Packages::create([
            'package_uuid' =>  $uuid,
            'package_name' => $request['package_name'],
            'vendor_uuid' => $request['vendor_uuid'],
            'is_live' => 'Y',
            'package_description' => $request['package_description'],
            'rates' => $request['package_rates'],
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
        return view('admins.dashboard', ['user' => Self::get_user() , 'vendors'=>  Self::get_vendor() ])
        ->with('success', "Successfully added!"); 
    }
    public function edit($package_uuid)
    { 
        $vendors = Packages::select("*")->where('package_uuid', $package_uuid)
        ->join('vendors', 'packages.vendor_uuid', '=', 'vendors.uuid')
        ->get()->first();
        return view('admins.packages.edit', ['user' => Self::get_user() , 'vendor'=>  $vendors]); 
    }

    public function update(Request $request)
    { 
      
        $res =  Packages::where('package_uuid', $request['package_uuid'])
            ->update([
                'package_name' => $request['package_name'],
                'package_description' => $request['package_description'],
                'rates' => $request['package_rates'],
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ]);
            if($res > 0){
                $msg = 'Successfully Updated!';
            } else{
                $msg = 'Error !';
            }
        return view('admins.dashboard', ['user' => Self::get_user() , 'vendors'=>  Self::get_vendor() ])
        ->with('success', $msg); 
    }

    public function delete($package_uuid)
    { 
      
        $res =  Packages::where('package_uuid', $package_uuid)
            ->delete();
            if($res > 0){
                $msg = 'Successfully Updated!';
            } else{
                $msg = 'Error !';
            }
        return view('admins.dashboard', ['user' => Self::get_user() , 'vendors'=>  Self::get_vendor() ])
        ->with('success', $msg); 
    }
    public static function get_vendor() {
        $vendor = DB::table('packages')
        ->join('vendors', 'packages.vendor_uuid', '=', 'vendors.uuid')
        ->select('packages.*', 'vendors.*')
        ->get();
        Self::$vendor = $vendor;    
        return Self::$vendor;
    }

    public static function get_user() {
        $user = Auth::user(); 
        Self::$user = $user;    
        return Self::$user;
    }
	
  
}

