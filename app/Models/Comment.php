<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    //Appartenance du comm. a un utilisateur
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Appartenance du comm. a une photo
    public function photo(){
        return $this->belongsTo('App\Models\Photo');
    }

    public function repliesTo(){
        return $this->belongsTo('App\Models\Comment','comment_id');
    }

    public function replies(){
        return $this->hasMany('App\Models\Comment');
    }

   
    use HasFactory;
}
