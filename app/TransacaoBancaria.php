<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransacaoBancaria extends Model
{
    protected $fillable = [ 'valor', 'tipo', 'conta_corrente_id', 'id'];
    
    public function contaBancaria()
    {
        return $this->belongsTo(ContaCorrente::class);
    }
}
