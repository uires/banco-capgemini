<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correntista extends Model
{
    protected $fillable = [
        'id', 'nome', 'senha', 'contaCorrente'
    ];
   
    protected $hidden = [
        'senha', 'remember_token',
    ];

    public function contaCorrente()
    {
        return $this->hasOne('App\ContaCorrente');
    }
}
