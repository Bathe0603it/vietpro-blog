<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB,Session;

class PostController extends Controller
{
    //
    function getAddPost(){
        $result = DB::table('vp_cat')->get();
        //dd($result);
        return view('backend.post.addpost',['data'=>$result]);
    }
    
    function postAddPost(Request $request){
        $arr = array(
            'post_name' => $request->name,
            'post_slug' => str_slug($request->name),
            'post_sum'  => $request->sum,
            'post_content'  => $request->content,
            'post_featured' => $request->featured,
            'post_cat'  => $request->cat,
            'post_created'  => date('Y-m-d H:i:s',time()+7*3600),
        );
        $file_name = $_FILES['img']['name'];
        $tmp_file = $_FILES['img']['tmp_name'];
        $file_path = 'public/upload/featured/'.$file_name;
        move_uploaded_file($tmp_file,$file_path);
        
        $arr['post_img']    = $file_name;
        
        DB::table('vp_post')->insert($arr);
        
        Session::flash('success','Add success');
        return redirect()->intended('admin/post/list');
    }
    
    function getList(){
        $result = DB::table('vp_post')
                        ->join('vp_cat','vp_post.post_cat','=','vp_cat.cat_id')
                        ->paginate(2);
        return view('backend.post.listpost',['data'=>$result]);
    }
    
    function getEditPost($id = null){
        $result = DB::table('vp_post')
                        //->select('vp_post.*,vp_cat.*')
                        ->join('vp_cat','vp_post.post_cat','=','vp_cat.cat_id')
                        ->where('post_id',$id)
                        ->first();
        $catalog = DB::table('vp_cat')
                        ->get();
        return view('backend.post.editpost',['data'=>$result,'catalog'=>$catalog]);
    }
    
    function postEditPost(Request $request,$id){
        $arr = array(
            'post_name' => $request->name,
            'post_slug' => str_slug($request->name),
            'post_sum'  => $request->sum,
            'post_content'  => $request->content,
            'post_featured' => $request->featured,
            'post_cat'  => $request->cat,
            'post_created'  => date('Y-m-d H:i:s',time()+7*3600),
        );
        $file_name = $_FILES['img']['name'];
        if(!empty($file_name)){
            $tmp_file = $_FILES['img']['tmp_name'];
            $file_path = 'public/upload/featured/'.$file_name;
            move_uploaded_file($tmp_file,$file_path);
            
            $arr['post_img']    = $file_name;
        }
        
        
        DB::table('vp_post')
                ->where('post_id',$id)
                ->update($arr);
        
        Session::flash('success','Add success');
        return redirect()->intended('admin/post/list');
    }
    
    function getDel($id){
        DB::table('vp_post')
                ->where('post_id',$id)
                ->delete();
        
        Session::flash('success','Del success');
        return redirect()->intended('admin/post/list');
    }
}
