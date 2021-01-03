<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    //Groups => Users
    public function group() {
        return $this->belongsToMany('App\Models\Group');
    }

    //Table pivot groupusers
    public function Groups()
    {
        return $this->belongsToMany('App\Models\Group')
                    ->using("App\Models\GroupUser");
    }

    //user => photos
    public function Photo() {
        return $this->belongsToMany("App\Models\Photo")
                     ->using('Illuminate\Database\Eloquent\Collection');
    }


    //user => comments
    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    //photos => users
    public function photos() {
        return $this->hasMany('App\Models\Photo');
    }

    //user => photos
    public function a_photosAppearance(){
        return $this->belongsToMany('App\Models\Photo');
    }

    //table pivot photouser
    public function PhotosAppearance()
    {
        return $this->belongsToMany('App\Models\Photo')
                    ->using("App\Models\PhotoUser");
    }
    
    use HasFactory, Notifiable;


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $fillable = [
        'name',
        'email',
        'password',
    ];


}
