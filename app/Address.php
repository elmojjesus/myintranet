<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function user(){
    	return $this->belongsTo('\App\User');
    }

    public function city(){
    	return $this->belongsTo('\App\City');
    }

    public function state() {
    	return $this->belongsTo('\App\State');
    }

    public function first(){
    	return null;
    }
}
