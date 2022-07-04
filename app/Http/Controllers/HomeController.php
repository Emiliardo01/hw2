<?php


namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class HomeController extends BaseController{

    public function checkLogin() {

        $username = User:: where('mail', session('email'))->get('Username');
        if((session('email'))!== null){
            return view('home')->with('email',session('email'))->with('user', $username)->with('csrf_token',csrf_token());
        }else{
            return redirect('login');
        }
    }

        public function selpiatto() {
           
             $json = Http::get("https://foodish-api.herokuapp.com/api/");


            return $json; 


        }

        public function inspost($titolo,$post,$immagine){
    
            $id = User::where('mail', session('email'))-> get('id');
    
            $myobj['immagine'] = $immagine;
            
            $myobj['titolo'] = $titolo;
            
            $myobj['post'] = $post;
           
            $invio = json_encode($myobj); 
    
    
            $result= Posts::create([
    
                'Utente' => $id[0]->id,
                'content' => $invio,
                'nlikes' => 0,
             
    
            ]); 
    
    
        }   
   
    
}
?>