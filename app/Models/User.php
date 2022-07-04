<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    protected $table = 'utente';
    protected $fillable = ['Nome', 'Cognome', 'mail', 'Password', 'Genere','Username'];
    //protected $hidden = 'password';
    public $timestamps = false;
    protected $hidden = ['password'];
    protected $primaryKey= "id";
    protected $autoIncrement = true;
    protected $keyType = "string";

    public function post()
    {
        return $this->hasMany("App\Models\Posts");
    }


    public function likes() {
        return $this->belongsToMany('App\Models\Posts', 'likes', 'idutente', 'idpost');
    }

}
?>