<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;


    public function replyTo()
    {
        return $this->belongsTo('App\Models\Comment');             
    }

    //photo belongs to an user
    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    //photo has pivot class for users
    public function users()
    {
        return $this->belongsToMany('App\Models\User')
                    ->using("App\Models\PhotoUser");
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    //photo belongs to a group
    public function group(){
        return $this->belongsTo('App\Models\Group');
    }

    //photo belongs to many tag
    public function tag() {
        return $this->belongsToMany('App\Models\Tag');
    }

    //photo has pivot class for tags
    public function Tags()
    {
        return $this->belongsToMany('App\Models\Tag')
                    ->using("App\Models\PhotoTag");
    }
 

    //photo belongs to many user
    public function user(){
        return $this->belongsToMany('App\Models\User');
    }


    
    
}
 