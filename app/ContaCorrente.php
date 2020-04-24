<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ContaCorrente extends Model
{   

    protected $fillable = [ 'saldo' ];
    protected $hidden = [ 'created_at', 'updated_at' ];

    /*
        @description: método de associação, requerido pelo eloquent
        @author: uíres
    */
    public function correntista()
    {

        return $this->belongsTo('App\Correntista');
    }

    public function transacoesBancarias()
    {

        return $this->hasMany(TransacaoBancaria::class);
    }
    
    /*  
        @description: 
        @author: uíres
    */
    public function depositarSaldo($saldo)
    {
        
        if ($saldo == 0.00 or $saldo < 0) {

            return false;
        } else {

            $this->saldo += $saldo;
            $this->save();
            return true;
        }
    }

    /*
        @description: verificar se há saldo acima do espero pra realizar a transação e realiza caso sim
        @author: uíres
    */
    public function sacar($valor)
    {

        if ($valor > $this->saldo) {

            return false;
        } else if ($valor <= 10.00) {

            return false;
        } else {

            $this->saldo = $this->saldo - $valor;
            $this->save();
            return true;
        }
    }
    
    /*
        @description: buscar o a conta corrente com base no número da agência e numero de conta
        @author: uíres
    */
    public function buscarContaPorNumeroContaAgencia($numeroConta, $agencia)
    {

        $contas = $this->whereRaw('numero_conta = ? and agencia = ?', array($numeroConta, $agencia))->get();
        if (count($contas) == 0) {

            return null;
        }
        return $contas[0];
    }
}
