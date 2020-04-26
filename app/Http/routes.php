<?php
/*
    Arquivo para tratamento dos endpoints
*/

Route::get('transacoes', "TransacoesController@index");
Route::get('correntistas', "CorrentistaController@index");
// Buscar a conta corrente com o número da conta e agência
Route::get('contacorrente/saldo/{numeroConta}/{agencia}', "ContaCorrenteController@buscarSaldoContaCorrente");
// Realiza deposíto
Route::post('contacorrente/depositar/{numeroConta}/{agencia}', "ContaCorrenteController@depositar");
// Realizar saque
Route::post('contacorrente/realizasaque/{numeroConta}/{agencia}', "ContaCorrenteController@realizasaque");
