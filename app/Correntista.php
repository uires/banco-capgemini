<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Correntista extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'id', 'nome', 'username', 'email'
    ];
   
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function contaCorrente()
    {
        return $this->hasOne('App\ContaCorrente');
    }
}
