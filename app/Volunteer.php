<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Volunteer extends Model
{
	use SoftDeletes;
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "volunteers";

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

    public function user() {
        return $this->belongsTo('\App\User');
    }

    public function departament() {
        return $this->belongsTo('\App\Departament');
    }

    public function status(){
        return $this->belongsTo('\App\Status');
    }
}
