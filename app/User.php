<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'image'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function deficiency() {
        return $this->belongsTo('\App\Deficiency');
    }

    public function education() {
        return $this->belongsTo('\App\Education');
    } 

    public function profession() {
        return $this->belongsTo('\App\Profession');
    }

    public function athlete(){
        return $this->hasOne('\App\Athlete');
    }

    public function document(){
        return $this->hasOne('\App\Document');
    }

    public function address(){
        return $this->hasOne('\App\Address');
    }

    public function contact(){
        return $this->hasOne('\App\Contact');
    }
}
