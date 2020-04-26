<?php
/*
    Arquivo para tratamento dos endpoints
*/
Route::group(['middleware' => ['auth:api']], function() {
    Route::get('transacoes', "TransacoesController@index")->middleware('auth:api');
    // Buscar correntista, informações de conta e agência por URL
    Route::get('correntista/{email}', "CorrentistaController@buscarCorrentista")->middleware('auth:api');
    // Buscar a conta corrente com o número da conta e agência
    Route::get('contacorrente/saldo/{numeroConta}/{agencia}', "ContaCorrenteController@buscarSaldoContaCorrente")->middleware('auth:api');
    // Realiza deposíto
    Route::post('contacorrente/depositar/{numeroConta}/{agencia}', "ContaCorrenteController@depositar")->middleware('auth:api');
    // Realizar saque
    Route::post('contacorrente/realizasaque/{numeroConta}/{agencia}', "ContaCorrenteController@realizasaque")->middleware('auth:api');
});
