<?php

namespace MyIntranet;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function user(){
    	return $this->belongsTo('\MyIntranet\User');
    }

    public function city(){
    	return $this->belongsTo('\MyIntranet\City');
    }

    public function state() {
    	return $this->belongsTo('\MyIntranet\State');
    }

    public function first(){
    	return null;
    }
}
