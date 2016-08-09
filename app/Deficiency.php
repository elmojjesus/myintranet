<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deficiency extends Model
{
    use SoftDeletes;
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'deficiencies';

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

    public function users() {
        return $this->hasMany('\App\User');
    }

    public function athletes($id) {
        return \App\Athlete::join('users', function ($join) use($id) {
            $join->on('users.id', '=', 'athletes.user_id')
                 ->where('users.deficiency_id', '=', $id);
        })
        ->get();
    }

}
