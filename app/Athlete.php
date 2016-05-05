<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Athlete extends Model
{
    use SoftDeletes;
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'athletes';

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

    protected $dates = ['deleted_at'];

    public function athleteSport() {
    	return $this->hasMany('\App\AthleteSport');
    }

    public function user(){
        return $this->belongsTo('\App\User');
    }

    public static function ScopeSex($sex) {
        return \App\Athlete::join('users', function ($join) use($sex) {
            $join->on('users.id', '=', 'athletes.user_id')
                 ->where('users.sex', '=', $sex);
        })
        ->get();
    }
}
