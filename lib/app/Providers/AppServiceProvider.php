<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

use App\Http\Requests;

use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $data['cat_list'] = DB::table('vp_cat')->get();
        $data['post_featured'] = DB::table('vp_post')->orderBy('post_id','desc')->get();
        // -- cach 1 de goi view
        //view()->share($data); 
        // -- cach 2 de goi view can truyen them thu vien use View
        View::share($data);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
