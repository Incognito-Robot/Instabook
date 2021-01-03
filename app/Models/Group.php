<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

   // Groupe => Plusieurs users
    public function user() {
        return $this->belongsToMany('App\Models\User');
    }

    // Photos => Groupe
    public function photos() {
        return $this->hasMany('App\Models\Photo');
    }

    //Table pivot GroupUsers => Group
    public function users()
    {
    return $this->belongsToMany('App\Models\User')
            ->using("App\Models\GroupUser");
    }


    use HasFactory;
}
