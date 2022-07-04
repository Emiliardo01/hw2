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


class RegisterController extends BaseController{

    public function controllaregistrazione(){
        
    if((session('username'))!== null){
        return redirect('home');
    }else{
    return view('register')
    ->with('csrf_token',csrf_token());
    }
    }

    public function controllautentepresente($query) {
        
        $exist = User::where('username', $query)->exists();

        if($exist){

            $flag = false;

            $check = 'Utente presente nel database!';

                    
            $send[0]= $check;

            $send[1]= $flag;

        }else {

            $check = 'Utente verificato, tutto ok!';
            $flag = true;

            $send[0]= $check;

            $send[1]= $flag;

        }

            return ['testo' => $send[0], 'flag' => $send[1]];

    }

    public function controllamail($query){
        
        $exist = User::where('mail', $query)->exists();


        if($exist){

            $flag = false;

            $check = 'Mail presente nel database!';

                    
            $send[0]= $check;

            $send[1]= $flag;

        }else {

            $check = 'Mail verificata, tutto ok!';
            $flag = true;

            $send[0]= $check;

            $send[1]= $flag;

        }

            return ['testo' => $send[0], 'flag' => $send[1]];
       

    }

    public function creautente(){
        $request = request();
        $propic = $request->has('avatar') ? $request->file('avatar') : null;
        $ip = $request->ip();

    if($this->countErrors($request) === 0) {
        $newUser = User::create([

            'Nome'=> $request['nome'],
            'Cognome'=> $request['cognome'],
            'mail'=> $request['email'],
            'Password'=> $request['password'],
            'Genere'=> $request['genere'],
            'Username'=> $request['username'],
            'propic' => $propic ?? null,
            'ip' => $ip,
            'verified' => false,
    
        ]);

        $newUser->save();

        if ($newUser) {
            Session::put('email', $newUser->mail);
            return redirect('home');
        } 
        else {
            return view('register') ->with('csrf_token',csrf_token())->withInput();
        }
    }else 
      
        
      
         return redirect('registrati')->with('csrf_token',csrf_token())->withInput();
            
       
    }

private function countErrors($data) {

    $error = array();
    

    if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $data['username'])) {
        $error[] = "Username non valido";
    } else {
        $username = User::where('Username', $data['username'])->first();
        if ($username !== null) {
            $error[] = "Username già utilizzato";
        }
    }
 
    if (strlen($data["password"]) < 8) {
        $error[] = "Password troppo corta!!!";
    } 

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $error[] = "Formato email non valido!!!";
    } else {
        $email = User::where('mail', $data['email'])->first();
        if ($email !== null) {
            $error[] = "Email già utilizzata!!!";
        }
    }

    return count($error);
}
}
?>