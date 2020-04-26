<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use \App\TransacaoBancaria;

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
    public function depositarSaldo($saldo, $tipo)
    {
        
        if ($saldo == 0.00 or $saldo < 0) {

            return false;
        } else {

            $transacaoBancaria = new TransacaoBancaria;
            $transacaoBancaria->valor = $saldo;
            $transacaoBancaria->tipo = $tipo;
            
            $this->saldo += $saldo;
            $this->save();
            $this->transacoesBancarias()->saveMany([$transacaoBancaria]);
            return true;
        }
    }

    /*
        @description: verificar se há saldo acima do espero pra realizar a transação e realiza caso sim
        @author: uíres
    */
    public function sacar($valor, $tipo)
    {

        if ($valor > $this->saldo) {

            return false;
        } else if ($valor <= 10.00) {

            return false;
        } else {

            $transacaoBancaria = new TransacaoBancaria;
            $transacaoBancaria->valor = $valor;
            $transacaoBancaria->tipo = $tipo;

            $this->saldo = $this->saldo - $valor;
            $this->save();
            $this->transacoesBancarias()->saveMany([$transacaoBancaria]);
            return true;
        }
    }

    private function formatarValorFloat() 
    {
	
	$this->saldo = number_format($this->saldo, 2, ',', '.');	
    }
    /*
        @description: buscar o a conta corrente com base no número da agência e numero de conta
        @author: uíres
    */
    public function buscarContaPorNumeroContaAgencia($numeroConta, $agencia)
    {

        $contas = $this->select()->where('numero_conta', $numeroConta)->where('agencia', $agencia)->get();
        if (count($contas) == 0) {

            return null;
        }
	    // $contas[0]->formatarValorFloat();
        return $contas[0];
    }
}
