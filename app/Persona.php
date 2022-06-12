<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Persona
 *
 * @property $id
 * @property $name
 * @property $phone
 * @property $casa_id
 * @property $role
 * @property $created_at
 * @property $updated_at
 *
 * @property Casa $casa
 * @property Movimiento[] $movimientos
 * @property User[] $users
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Persona extends Model
{
    
    static $rules = [
		'role' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','phone','casa_id','role'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function casa()
    {
        return $this->hasOne('App\Casa', 'id', 'casa_id');
    }
    public function role_()
    {
        return $this->hasOne('App\Role', 'id', 'role');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movimientos()
    {
        return $this->hasMany('App\Movimiento', 'persona_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User', 'persona_id', 'id');
    }
    

}
