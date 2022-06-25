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
 * @property Token $token_entrada_
 * @property Token $token_salida_
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
    protected $fillable = ['hora_de_entrada', 'hora_de_salida', 'persona_id', 'token_entrada', 'token_salida'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function persona()
    {
        return $this->hasOne('App\Persona', 'id', 'persona_id');
    }

    public function token_entrada_()
    {
        return $this->hasOne('App\Token', 'id', 'token_entrada');
    }
    public function token_salida_()
    {
        return $this->hasOne('App\Token', 'id', 'token_salida');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getBehaviourAttribute()
    {
        if (!$this->token_entrada_->valid) //entro?
        {
            //si
            if (!$this->token_salida_->valid) //salio?
            {
                //si
                if ($this->token_entrada_->updated_at < $this->token_salida_->updated_at) //entro y luego salio?
                {
                    //si
                    return 'entro y luego salio'; //esta fuera
                } 
                else
                {
                    //no
                    return 'salio y luego entro'; //esta dentro
                }
            } else {
                //no
                return 'entro pero no salio'; //esta dentro
            }
        } else {
            //no
            if (!$this->token_salida_->valid) //salio?
            {
                //si
                return 'salio pero no entro'; //esta fuera
            } else {
                //no
                return 'no hay datos'; //no se sabe
            }
        }
    }

    public function getInsideAttribute()
    {
        if (!$this->token_entrada_->valid) //entro?
        {
            //si
            if (!$this->token_salida_->valid) //salio?
            {
                //si
                if ($this->token_entrada_->updated_at < $this->token_salida_->updated_at) //entro y luego salio?
                {
                    //si
                    return 2; //entro y luego salio
                } 
                else
                {
                    //no
                    return 1; //salio y luego entro
                }
            } else {
                //no
                return 1; //entro pero no salio
            }
        } else {
            //no
            if (!$this->token_salida_->valid) //salio?
            {
                //si
                return 2; //salio pero no entro
            } else {
                //no
                return 3;//no hay datos
            }
        }
    }
}
