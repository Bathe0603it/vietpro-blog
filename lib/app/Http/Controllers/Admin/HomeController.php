<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;

class HomeController extends Controller
{
    //
    function getHome(){
        return view('backend.dashboard');
    }
    
    function getLogout(){
        Session::forget('login');
        return redirect('login');
    }
}
