<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContaCorrente extends Model
{
    public function correntista()
    {
        return $this->belongsTo('App\Correntista');
    }
}
