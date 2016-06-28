<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pacient extends Model
{
    use SoftDeletes;

        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pacients';

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

    public function user() {
        return $this->belongsTo('\App\User');
    }

    public function status() {
        return $this->belongsTo('\App\Status');
    }

    public function pacientTherapy() {
        return $this->hasMany('\App\PacientTherapy');
    }

    public static function ScopeSex($sex) {
        return \App\Pacient::join('users', function ($join) use($sex) {
            $join->on('users.id', '=', 'pacients.user_id')
                 ->where('users.sex', '=', $sex);
        })
        ->get();
    }
}
