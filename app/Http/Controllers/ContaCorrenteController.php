<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ContaCorrente;
use App\Correntista;

class ContaCorrenteController extends Controller
{
    public function buscarSaldoContaCorrente($numeroConta, $agencia)
    {
        
        $contaCorrente = new ContaCorrente();
        $contaCorrente = $contaCorrente->buscarContaPorNumeroContaAgencia($numeroConta, $agencia);
        
        if ($contaCorrente == null) {
            
            return response()->json(['message' => 'Não foi encontrada o saldo da conta desejada'], 404);
        }
        return response()->json($contaCorrente, 200);
    }

    public function depositar(Request $request, $numeroConta, $agencia)
    {

        $contaCorrente = new ContaCorrente();
        $contaCorrente = $contaCorrente->buscarContaPorNumeroContaAgencia($numeroConta, $agencia);

        if($contaCorrente == null) {

            return response()->json([
                'message'   => 'Conta corrente não encontrada',
            ], 404);
        }

        $valor = $contaCorrente->depositarSaldo($request->input('valor'));
        if ($contaCorrente == false)  return response()->json(['message' => 'Valor de deposito menor do que zero'], 404);

        return response()->json($contaCorrente, 200);
    }

    public function realizasaque(Request $request, $numeroConta, $agencia)
    {

        $contaCorrente = new ContaCorrente();
        $contaCorrente = $contaCorrente->buscarContaPorNumeroContaAgencia($numeroConta, $agencia);

        if($contaCorrente == null) {

            return response()->json([
                'message'   => 'Conta corrente não encontrada',
            ], 404);
        }

        $valor = $contaCorrente->sacar($request->input('valor'));
        if ($valor == false)  return response()->json(['message' => 'Valor de saque maior do que o saldo'], 404);

        return response()->json($contaCorrente, 200);
    }
}
