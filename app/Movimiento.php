<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Movimiento
 *
 * @property $id
 * @property $hora_de_entrada
 * @property $hora_de_salida
 * @property $persona_id
 * @property $token_entrada
 * @property $token_salida
 * @property $created_at
 * @property $updated_at
 *
 * @property Persona $persona
 * @property Token $token
 * @property Token $token
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Movimiento extends Model
{
    
    static $rules = [
		'persona_id' => 'required',
		'token_entrada' => 'required',
		'token_salida' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['hora_de_entrada','hora_de_salida','persona_id','token_entrada','token_salida'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function persona()
    {
        return $this->hasOne('App\Persona', 'id', 'persona_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
}
