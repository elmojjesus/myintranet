<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AthleteSport extends Model
{
    use SoftDeletes;
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'athlete_sports';

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

    public function athlete() {
    	return $this->belongsTo('\App\Athlete');
    }

    public function sport() {
    	return $this->belongsTo('\App\Sport');
    }

    public function status() {
        return $this->belongsTo('\App\Status');
    }
}
