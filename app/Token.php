<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Token
 *
 * @property $id
 * @property $code
 * @property $valid
 * @property $created_at
 * @property $updated_at
 *
 * @property Movimiento[] $movimientos
 * @property Movimiento[] $movimientos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Token extends Model
{
    
    static $rules = [
		'valid' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['code','valid'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movimientos()
    {
        return $this->hasMany('App\Movimiento', 'token_salida', 'id');
    }
    
}
