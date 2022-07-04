<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use App\Models\Likes;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;



class PostController extends BaseController{

    public function posts(){

    $username = User:: where('mail', session('email'))->get('Username');
    if(session('email') != null){
        return view('posts')->with('email',session('email'))->with('user', $username)->with('csrf_token',csrf_token());;
    }else{
       
    return redirect('login');
    
    }
    }



    public function postShow(){

        $posts = Posts::all();

        foreach($posts as $post){

            $user[] = User::where('id', $post->Utente)->first();


        }
        
        

        return json_encode(['posts' => $posts, "Utente" => $user]);


    }


    public function likePost($var, $var2){

        $request = request();

        $propic = $request->has('avatar') ? $request->file('avatar') : null;
        $ip = $request->ip();

        $user = User::where('mail', session('email'))->get('id'); 

        $result= Likes::create([

            'idutente' => $user[0]->id,
            'idpost' => $var,
            'propic' => $propic ?? null,
            'ip' => $ip,
            'verified' => false,

        ]);


        $likes = Posts::where('id', $var)-> get('nlikes');

        return['nlike' => $likes, 'idpost' => $var2];

    }

    
    public function unlikePost($var1, $var2){

        $userid = User::where('mail', session('email'))->get('id'); 

        $us = Likes::where('idutente', $userid[0]->id)->where('idpost',$var1);

        $us->delete();

        $likes = Posts::where('id', $var2)-> get('nlikes');

        return['nlike' => $likes, 'idpost' => $var2];

    }


    public function checkLike(){


        $query = Posts::all();

        $npost = $query->count();

        $id = User::where('mail', session('email'))-> get('id');


       $idpost = Likes::where('idutente', $id[0]->id)->get('idpost');

        if($idpost){

            $messaggio = 'Presente!';

        }

        return json_encode (["id" => $idpost, "messaggio"=> $messaggio, "idpostutti" => $npost ]); 



    }


    
}
?>