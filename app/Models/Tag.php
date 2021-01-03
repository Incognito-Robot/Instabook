<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{


    //Pivot PhotoTag pour Photos
    public function Photos()
    {
        return $this->belongsToMany('App\Models\Photo')
                    ->using("App\Models\PhotoTag");
    }

        //Tag => Photos
    public function photo() {
        return $this->belongsToMany('App\Models\Photo');
    }
    
    use HasFactory;

}
