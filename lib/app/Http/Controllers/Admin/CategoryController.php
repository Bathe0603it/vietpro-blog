<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB,Session;

class CategoryController extends Controller
{
    //
    function getAddCat(){
        return view('backend.cat.addcat');
    }
    
    function postAddCat(Request $request){
        $arr = array(
            'cat_name'  => $request->name,
            'cat_slug'  => str_slug($request->name),
        );
        if(DB::table('vp_cat')->where('cat_name',$request->name)->count()>0){
            Session::flash('error','Name category exits');
            return redirect()->back();
        }
        $result = DB::table('vp_cat')->insert($arr);
        Session::flash('success','Add success');
        return redirect('admin/cat/add');
    }
    
    function getList(){
        $result = DB::table('vp_cat')->paginate(3);
        return view('backend.cat.listcat',['data'=>$result]);
    }
    
    function getEdit($id){
        $result = DB::table('vp_cat')
                    ->where('cat_id',$id)
                    ->first();
        return view('backend.cat.editcat',['item'=>$result]);
    }
    
    function postEdit(Request $request,$id){
        $arr = array(
            'cat_name'  => $request->name,
            'cat_slug'  => str_slug($request->name),
        );
        $result = DB::table('vp_cat')
                        ->where('cat_id',$id)
                        ->update($arr);
        if($result){
            Session::flash('success','Update ok');
            return redirect('admin/cat/list');
        }
        else{
            return redirect()->back();
        }
    }
    
    function getDel($id){
        DB::table('vp_cat')
                ->where('cat_id',$id)
                ->delete();
        Session::flash('success','Delete ok');
        return redirect('admin/cat/list');
    }
}
