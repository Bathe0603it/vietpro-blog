<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@getIndex');
Route::get('bai-viet/{slug}/{id}.html', 'PostController@getPost');
Route::post('bai-viet/{slug}/{id}.html', 'PostController@commentAdd');
Route::post('bai-viet/{slug}/{id}.html', 'PostController@commentAdd');
Route::get('danh-muc/{id}/{slug}.html','PostController@getCat');
Route::post('danh-muc/{id}/{slug}.html','PostController@getSearcha');
Route::get('search','PostController@getSearch');

Route::get('cart','CartController@cart');

Route::get('addcart/{id}','CartController@addCart');
Route::get('showcart','CartController@showCart');

Route::get('mail','MailsendController@mail');

Route::get('create-user','Admin\LoginController@createUser');



Route::group(['namespace'=>'Admin'],function(){
    Route::group(['prefix'=>'login','middleware'=>'checkLogin'],function(){
        Route::get('/','LoginController@getLogin');
        Route::post('/','LoginController@postLogin');
    });
    Route::group(['prefix'=>'admin','middleware'=>'checkLogout'],function(){
        Route::get('home','HomeController@getHome');
        Route::get('logout','HomeController@getLogout');
        
        Route::group(['prefix'=>'cat'],function(){
            Route::get('add','CategoryController@getAddCat');
            Route::post('add','CategoryController@postAddCat');
            Route::get('list','CategoryController@getList');
            Route::get('edit/{id}','CategoryController@getEdit');
            Route::post('edit/{id}','CategoryController@postEdit');
            Route::get('del/{id}','CategoryController@getDel');
        });
        Route::group(['prefix'=>'post'],function(){
            Route::get('add','PostController@getAddPost');
            Route::post('add','PostController@postAddPost');
            
            Route::get('list','PostController@getList');
            
            Route::get('edit/{id}','PostController@getEditPost');
            Route::post('edit/{id}','PostController@postEditPost');
            
            Route::get('del/{id}','PostController@getDel');
        });
    });
    
});
