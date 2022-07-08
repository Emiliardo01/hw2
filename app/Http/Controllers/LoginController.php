<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class LoginController extends BaseController{

    public function login(){
        
    if(session('email') != null){
        return redirect('home');
    }else{

        $errore = '';

        return view('login')->with('csrf_token',csrf_token())->with('errore', $errore);
    }
    }

    public function controllalogin(){


        $result = User::where('mail',request('email'))->where('password', request('password'))->first();
        
        if( $result != null){

            Session::put('email',$result->mail);
            return redirect('home');

        }else{

            $errore = 'errore';
            
            return view('login')->with('errore', $errore); 
           
        }
       
    }

    public function logout(){
        Session:: flush();

    return redirect('login');

    }
}
?>