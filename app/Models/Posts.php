<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;




class Posts extends Model
{
    protected $table = 'posts';
    protected $fillable = ['id', 'Utente', 'time', 'nlikes', 'ncomments','content'];
    public $timestamps = false;
    protected $primaryKey= "id";

    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }

    public function likes(){
        return $this->belongsToMany('App\Models\Likes');
    }
}
?>