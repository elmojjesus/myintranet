<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'regionais';

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

    public function users() {
        return $this->hasMany('\App\User');
    }

    public function athletes($id) {
        return \App\Athlete::join('users', function ($join) use($id) {
            $join->on('users.id', '=', 'athletes.user_id')
                 ->where('users.regional_id', '=', $id);
        })
        ->get();
    }

}
