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

    public function profile() {
        return $this->hasOne('\App\Profile');
    }

    public static function notProfile() {
        $profiles = \App\Profile::all();
        $ids = [];
        foreach ($profiles as $profile) {
            $ids[] = $profile->user->id;
        }
        return \App\User::whereNotIn('id', $ids)->orderBy('name')->get();
    }

    public function pacient() {
        return $this->hasOne('\App\Pacient');
    }

    public static function notPacients() {
        $pacients = \App\Pacient::All();
        $ids = [];
        foreach ($pacients as $pacient) {
            $ids[] = $pacient->user->id;
        }
        return \App\User::whereNotIn('id', $ids)->orderBy('name')->get();
    }

    public function status() {
        return $this->belongsTo('App\Status');
    }

    public function employee() {
        return $this->hasOne('\App\Employee');
    }

    public function voluntareers() {
        return $this->hasOne('\App\Volunteer');
    }

    public static function extrangeArray($data){
        if (isset($data['created_at'])) {
            $date = \Datetime::createFromFormat('d/m/Y', $data['created_at']);
            if($date) {
                $data['created_at'] = $date->format('Y-m-d');
            } else {
                $data['created_at'] = 'NULL';
            }
        }
        $birthDate = \DateTime::createFromFormat('d/m/Y', $data['birthDate']);
        if ($birthDate) {
            $data['birthDate'] = $birthDate->format('Y-m-d');
        } else {
            unset($data['birthDate']);
        }
        if (!isset($data['deficiency_id']) || $data['deficiency_id'] == '') {
            if (isset($data['deficiency_id'])) {
                unset($data['deficiency_id']);
            }
        }

        if (!isset($data['education_id']) || $data['education_id'] == '') {
            if (isset($data['education_id'])) {
                unset($data['education_id']);
            }
        }

        if (!isset($data['profession_id']) || $data['profession_id'] == '') {
            if (isset($data['profession_id'])) {
                unset($data['profession_id']);
            }
        }        

        return $data;
    }
}
