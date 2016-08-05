<?php

namespace MyIntranet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Therapy extends Model
{
    use SoftDeletes;

        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'terapies';

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

    public function pacientTherapy() {
        return $this->hasMany('\MyIntranet\PacientTherapy');
    }
}
