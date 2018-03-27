<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use DB;

class PostController extends HomeController
{
    //
    public function getPost($slug,$id){
        //dd(action('HomeController@getIndex'));
        $result = DB::table('vp_post')
                        ->join('vp_cat','vp_post.post_cat','=','vp_cat.cat_id')
                        ->where('post_id',$id)
                        ->first();
        $cmt = DB::table('vp_post')
                        ->join('vp_comment','vp_post.post_id','=','vp_comment.comment_post')
                        ->where('post_id',$id)
                        ->orderBy('comment_id','desc')
                        ->get();
        //dd($result);
        return view('frontend.single',['item'=>$result,'cmt'=>$cmt]);
    }
    
    function commentAdd(Request $request,$slug,$id){
        $arr = array(
            'comment_post'  => $id,
            'comment_name'  => $request->name,
            'comment_email' => $request->email,
            'comment_content'   => $request->message,
            'comment_created'   => date('Y-m-d H:i:s',time()+7*3600),
        );
        DB::table('vp_comment')->insert($arr);
        return redirect()->back();
    }
    
    function getCat($id,$lug){
        $result['list_post'] = DB::table('vp_post')
                        ->join('vp_cat','vp_post.post_cat','=','vp_cat.cat_id')
                        ->where('cat_id',$id)
                        ->paginate(2);
        return view('frontend.index',$result);
    }
    
    function getSearch(){
        $x = Input::get('key');
        $x = str_replace(' ','%',$x);
        $result = DB::table('vp_post')
                        ->where('post_name','like','%'.$x.'%')
                        ->get();
        echo '<div class="alert alert-info">';
        foreach($result as $val){
            $url = asset('bai-viet/'.$val->post_name.'/'.$val->post_id).'.html';
            $name = $val->post_name;
            echo '<a ';
            echo 'href="'.$url.'"';
            echo '>';
            echo $name;
            echo '</a><br>';
        }
        echo '</div>';
    }
    
    function getSearcha(){
        $x = Input::get('query');
        $x = str_replace(' ','%',$x);
        $result = DB::table('vp_post')
                        ->where('post_name','like','%'.$x.'%')
                        ->get();
        echo '<div class="alert alert-info">';
        foreach($result as $val){
            $url = asset('bai-viet/'.$val->post_name.'/'.$val->post_id).'.html';
            $name = $val->post_name;
            echo '<a ';
            echo 'href="'.$url.'"';
            echo '>';
            echo $name;
            echo '</a><br>';
        }
        echo '</div>';
    }
}
