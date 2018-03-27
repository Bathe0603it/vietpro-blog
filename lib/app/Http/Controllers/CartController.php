<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;

class CartController extends Controller
{
    //
    public function cart(){
        return view('cart.viewcart');
    }
    
    function demo(){
        if(Session::has('cart')){
    		$arr = Session::get('cart');
    		if(array_key_exists($id,$arr)){
    			$arr[$id]++;
    			Session::put('cart',$arr);
    		}
    		else{
    			$arr[$id] = 1;
    			Session::put('cart',$arr);
    		}
    	}
    	else{
    		$arr[$id] = 1;
    		Session::put('cart',$arr);
    	}
    	return redirect('showcart');
    }
    public function addCart($id){
        if(Session::has('cart')){
            $arr = Session::get('cart');
            if(array_key_exists($id,$arr)){
                $arr[$id]++;
                Session::put('cart',$arr);
            }
        }
        else{
            $arr[$id] = 1;
            Session::put('cart',$arr);
        }
        return view('cart.viewcart');
        
    }
    public function showCart(){
        dd(Session::all());
    }
}
