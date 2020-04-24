<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Correntista;
use App\ContaCorrente;

class CorrentistaController extends Controller
{
    public function index()
    {
        
        return ContaCorrente::find(1)->user;
    }

    public function salvarCorrentista()
    {
        
        $correntista = new Correntista();
        $correntista->nome = 'Uíres Sousa';
        $correntista->senha = \Hash::make('220132');
        $correntista->save();
    }

    public function salvarCorrentistaContaCorrente()
    {
        
        $correntista = Correntista::find(1);
        $contaCorrente = new ContaCorrente();
        $contaCorrente->numero_conta = rand();
        $contaCorrente->agencia = '547512-1';
        $contaCorrente->saldo = 7512.12;
        $correntista->contaCorrente()->save($contaCorrente);
    }


}
