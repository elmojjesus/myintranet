<?php

namespace MyIntranet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Education extends Model
{
    use SoftDeletes;
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'educations';

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
}
