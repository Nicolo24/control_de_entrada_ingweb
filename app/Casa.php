<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Casa
 *
 * @property $id
 * @property $friendly_id
 * @property $latitude
 * @property $longitude
 * @property $phone
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Casa extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['friendly_id','latitude','longitude','phone'];



}
