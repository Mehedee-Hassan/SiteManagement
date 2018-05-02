<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //


    public function port(){
        return $this->belongsTo('\App\Port');
    }

    public function images(){
        return $this->hasMany('\App\Image');
    }
}
