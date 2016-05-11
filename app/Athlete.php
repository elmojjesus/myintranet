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


    public function status(){
        return $this->belongsTo('\App\Status');
    }

    public function scopeAmountSports(){
        $status = \App\Status::where('name', 'Inativo')->first();
        return \App\AthleteSport::where(function($query) use($status){
            $query->where('athlete_id', $this->id);
            $query->where('status_id', '!=', $status->id);
        })->groupBy('sport_id')->count();
    }

    public static function ScopeSex($sex) {
        return \App\Athlete::join('users', function ($join) use($sex) {
            $join->on('users.id', '=', 'athletes.user_id')
                 ->where('users.sex', '=', $sex);
        })
        ->get();
    }
}
