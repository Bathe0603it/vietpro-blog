<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail,DB;

class MailsendController extends Controller
{
    //
    public function mail(){
        $user['email']  = 'kaka0603nd@gmail.com';
        $user['name']   = 'kaka0603nd';
        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            //$m->from($user['email'], 'Your Application');

            $m->to($user['email'], $user['name'])->subject('Your Reminder!');
            echo 'function mail';
        });
        
    }
    
    
}
