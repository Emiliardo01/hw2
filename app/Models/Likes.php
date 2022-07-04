<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;




class Likes extends Model
{
    protected $table = 'likes';
    protected $fillable = ['idutente', 'idpost'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }

    public function post()
    {
        return $this->belongsTo("App\Models\Posts");
    }
}
?>