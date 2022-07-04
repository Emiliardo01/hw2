<?php


namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class SearchUserController extends BaseController{

    public function check(){

        $username = User:: where('mail', session('email'))->get('Username');

        if((session('email'))!== null){
            return view('search_users')->with('email',session('email'))->with('user', $username)->with('csrf_token',csrf_token());
        }else{
            return redirect('login');
        }
    }

        public function SpotifAPI($q) {
            
            $token = Http::asForm()->withHeaders([
                'Authorization' => 'Basic '.base64_encode(('d4c860fba30d49e5ad6cce24a046379b').':'.('5174c572bd624d8588ce342797b766a4')),
            ])->post('https://accounts.spotify.com/api/token', [
                'grant_type' => 'client_credentials',
            ]);

            $json = Http::withHeaders([
                'Authorization' => 'Bearer '.$token['access_token']
            ])->get('https://api.spotify.com/v1/search', [
                'type' => 'artist',
                'q' => $q
            ]);

            return $json;
        }
   

        public function ricerca($var1, $var2){

            $result = User::where("Nome", $var1)->where("Cognome", $var2)->first();

            if($result){


                return json_encode(array(["Nome"=> $result->Nome, "Cognome" => $result->Cognome, "mail" => $result->mail ]));

            }else{


                return json_encode(array("Nessun utente presente!"));

            }

           


        }
    
}
?>