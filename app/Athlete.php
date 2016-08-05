<?php

namespace MyIntranet;

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
    	return $this->hasMany('\MyIntranet\AthleteSport');
    }

    public function user(){
        return $this->belongsTo('\MyIntranet\User');
    }


    public function status(){
        return $this->belongsTo('\MyIntranet\Status');
    }

    public function scopeAmountSports(){
        $status = \MyIntranet\Status::where('name', 'Inativo')->first();
        return \MyIntranet\AthleteSport::where(function($query) use($status){
            $query->where('athlete_id', $this->id);
            $query->where('status_id', '!=', $status->id);
        })->groupBy('sport_id')->count();
    }

    public static function ScopeSex($sex) {
        return \MyIntranet\Athlete::join('users', function ($join) use($sex) {
            $join->on('users.id', '=', 'athletes.user_id')
                 ->where('users.sex', '=', $sex);
        })
        ->get();
    }
}
