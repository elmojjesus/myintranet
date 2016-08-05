<?php

namespace MyIntranet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'documents';

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

    public static function extrangeArray($data) {
        $doccument['rg'] = isset($data['rg']) ? $data['rg'] : ''; 
        $doccument['cpf'] = isset($data['cpf']) ? $data['cpf'] : '';
        $doccument['passport'] = isset($data['passport']) ? $data['passport'] : '';

        if (isset($data['emission_rg'])) {
            $date = \Datetime::createFromFormat('d/m/Y', $data['emission_rg']);
            if (!$date) {
                $doccument['emission_rg'] = 'NULL';
            } else {
                $doccument['emission_rg'] = $date->format('Y-m-d');
            }
        }

        if (isset($data['emission_cpf'])) {
            $date = \Datetime::createFromFormat('d/m/Y', $data['emission_cpf']);
            if (!$date) {
                $doccument['emission_cpf'] = 'NULL';
            } else {
                $doccument['emission_cpf'] = $date->format('Y-m-d');
            }
        }

        if (isset($data['emission_passport'])) {
            $date = \Datetime::createFromFormat('d/m/Y', $data['emission_passport']);
            if (!$date) {
                $doccument['emission_passport'] = 'NULL';
            } else {
                $doccument['emission_passport'] = $date->format('Y-m-d');
            }
        }
        return $doccument;
    }
}
