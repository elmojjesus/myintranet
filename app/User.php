<?php

namespace MyIntranet;

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
        return $this->belongsTo('\MyIntranet\Deficiency');
    }

    public function education() {
        return $this->belongsTo('\MyIntranet\Education');
    } 

    public function profession() {
        return $this->belongsTo('\MyIntranet\Profession');
    }

    public function athlete(){
        return $this->hasOne('\MyIntranet\Athlete');
    }

    public function document(){
        return $this->hasOne('\MyIntranet\Document');
    }

    public function address(){
        return $this->hasOne('\MyIntranet\Address');
    }

    public function contact(){
        return $this->hasOne('\MyIntranet\Contact');
    }

    public function profile() {
        return $this->hasOne('\MyIntranet\Profile');
    }

    public static function notProfile() {
        $profiles = \MyIntranet\Profile::all();
        $ids = [];
        foreach ($profiles as $profile) {
            $ids[] = $profile->user->id;
        }
        return \MyIntranet\User::whereNotIn('id', $ids)->orderBy('name')->get();
    }

    public function pacient() {
        return $this->hasOne('\MyIntranet\Pacient');
    }

    public static function notPacients() {
        $pacients = \MyIntranet\Pacient::All();
        $ids = [];
        foreach ($pacients as $pacient) {
            $ids[] = $pacient->user->id;
        }
        return \MyIntranet\User::whereNotIn('id', $ids)->orderBy('name')->get();
    }

    public function status() {
        return $this->belongsTo('MyIntranet\Status');
    }

    public function employee() {
        return $this->hasOne('\MyIntranet\Employee');
    }

    public function voluntareers() {
        return $this->hasOne('\MyIntranet\Volunteer');
    }

    public static function extrangeArray($data, $type = 'edit'){

        if (isset($data['birthDate'])) {
            $birthDate = \DateTime::createFromFormat('d/m/Y', $data['birthDate']);
            if ($birthDate) {
                $data['birthDate'] = $birthDate->format('Y-m-d');
            }
        }

        if (!isset($data['deficiency_id']) || $data['deficiency_id'] == '') {
            if (isset($data['deficiency_id'])) {
                unset($data['deficiency_id']);
            }
            if ($type == 'edit') {
                $data['deficiency_id'] = null;
            }
        }

        if (isset($data['created_at'])) {
            $date = \Datetime::createFromFormat('d/m/Y', $data['created_at']);
            if($date) {
                $data['created_at'] = $date->format('Y-m-d H:i:s');
            } else {
                if ($type == 'create') {
                    $now = new \Datetime();
                    $data['created_at'] = $now->format('Y-m-d H:i:s');
                } else {
                    unset($data['created_at']);
                }
            }
        } else {
            if($type == 'create') {
                $now = new \Datetime();
                $data['created_at'] = $now->format('Y-m-d H:i:s');
            } else {
                unset($data['created_at']);
            }
        }

        if (!isset($data['education_id']) || $data['education_id'] == '') {
            if (isset($data['education_id'])) {
                unset($data['education_id']);
            }
            if ($type == 'edit') {
                $data['education_id'] = null;
            }
        }

        if (!isset($data['profession_id']) || $data['profession_id'] == '') {
            if (isset($data['profession_id'])) {
                unset($data['profession_id']);
            }
            if ($type == 'edit') {
                $data['profession_id'] = null;
            }
        }        

        return $data;
    }
}
