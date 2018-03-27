<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB,Session;

class LoginController extends Controller
{
    //
    function createUser(){
        $arr = array(
            'user_name'=>'k31',
            'user_password' => md5(123456),
            'user_level'    => 1,
            'user_created'  => gmdate('Y-m-d H:i:s',time()+7*3600),
        );
        DB::table('vp_user')->insert($arr);
    }
    
    function getLogin(){
        return view('backend.login.login');
    }
    
    function postLogin(Request $request){
        $arr = array(
            'user_name' => $request->username,
            'user_password' => md5($request->password),
        );
        $result = DB::table('vp_user')->where($arr)->count();
        if($result>0){
            $result = DB::table('vp_user')->where($arr)->first();
            Session::put('login',$result);
            Session::flash('success','Login success');
            return redirect('admin/home');
        }
        else{
            Session::flash('error','Contact or Password is\'t exit');
            return redirect()->back();
        }
    }
}
