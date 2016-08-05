<?php

namespace MyIntranet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employees';

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
        return $this->belongsTo('\MyIntranet\User');
    }

    public function departament() {
        return $this->belongsTo('\MyIntranet\Departament');
    }

    public function status(){
        return $this->belongsTo('\MyIntranet\Status');
    }
}
