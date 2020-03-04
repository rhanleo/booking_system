<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Cookie;
use Session;
use Carbon\Carbon;

class apiController extends Controller
{
     
    public function api(){
        $user = \DB::table('customers')
                ->get();
        return response($user, 200)
        // ->header('APP_KEY','ejkgUo28WWwXgQzZb2JDr08rLg9tK3osEFsmSAFMkNAX5hdaCCVT1zefWym5')
        ->header('Content-Type','application/json');
    }


}
