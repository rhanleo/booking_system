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

class vendorController extends Controller
{
    
    public function index()
    {
        $vendors = Vendors::select('*')->get();
        return view('admins.vendors.index', ['vendors' => $vendors ]); 
    }

    public function create()
    {
        $admin = Auth::user();
        return view('admins.vendors.create', ['admin' => $admin ]); 
    }
    protected function add(Request $request)
    {
       
        $target_dir = "images/vendor/";
        $fName = strtolower($_FILES["vendor_logo"]["name"]);
        $fileName = str_replace(' ', '-', $fName);
        
        $target_file = $target_dir . $fileName ;        
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image      
        $check = getimagesize($_FILES["vendor_logo"]["tmp_name"]);
        if($check == false) {
            return back()->with('error', 'File is empty.');  
            $uploadOk = 0;
            
        }
        $valid_img_type = ['jpg', 'png', 'jpeg'];
        if (!in_array($imageFileType, $valid_img_type )){
            return back()->with('error', $fileName. " file is not an image.");
        }

        
        $uploadOk = 1;
        $uuid = (string) Str::uuid();
        $admin_uuid = Auth::user()->uuid;
        // dd($admin_uuid );
        $res =  Vendors::create([
            'uuid' =>  $uuid ,
            'admin_uuid'   => $admin_uuid,
            'vendor_name' => $request['vendor_name'],
            'vendor_note' => $request['vendor_note'],
            'vendor_contact' => $request['vendor_contact'],
            'vendor_logo' => $fileName,
            'vendor_email' => $request['vendor_email'],
            'is_live' => 'Y',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
        
        if (file_exists($target_file)) {
            return back()->with('error', 'Sorry, file already exists.');           
        }
        if (move_uploaded_file($_FILES["vendor_logo"]["tmp_name"], $target_file)) {                               
            
        } else {        
            return back()->with('error', $fileName. " Sorry, there was an error uploading your file.");
        }

        return Redirect::route('admin.vendor.index')->with('success', " Successfully, created vendor.");
        
    }
	
  
}

