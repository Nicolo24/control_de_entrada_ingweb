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

    public function token_visitante(){
      $pass=false;
      $code=random_int(10000,99999);
      $tokens=$this->all();
      while ($pass):
        $filtered=$tokens->search($code);
        $pass=($filtered->count()==0);
      endwhile;
      $token=new Token();
      $token->code=$code;
      $token->save();
      return $token;
    }

    public function token_propietario(){
      $pass=false;
      $code=random_int(100000,999999);
      $tokens=$this->all();
      while ($pass):
        $filtered=$tokens->search($code);
        $pass=($filtered->count()==0);
      endwhile;
      $token=new Token();
      $token->code=$code;
      $token->save();
      return $token;
    }

}
