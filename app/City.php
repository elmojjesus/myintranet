<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
    
	public function state(){
		return $this->belongsTo('\App\State');
	}

	public function address(){
		return $this->hasMany('\App\Address');
	}

}
