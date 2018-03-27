<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Http\Requests;

use DB;

class HomeController extends Controller
{
    //
    function __construct(){
        /*$data['cat_list'] = DB::table('vp_cat')->get();
        $data['post_featured'] = DB::table('vp_post')->orderBy('post_id','desc')->get();
        // -- cach 1 de goi view
        //view()->share($data); 
        // -- cach 2 de goi view can truyen them thu vien use View
        View::share($data);*/
    }
    function getIndex(){
        $data['list_post'] = DB::table('vp_post')
                                    ->join('vp_cat','vp_post.post_id','=','vp_cat.cat_id')
                                    ->orderBy('post_id','desc')
                                    ->paginate(3);
        return view('frontend.index',$data);
    }
}
