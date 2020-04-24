<?php

use App\Correntista;
Route::get('correntistas', "CorrentistaController@index");
Route::get('correntistas/um', "CorrentistaController@salvarCorrentistaContaCorrente");
Route::get('correntistas/salvar', "CorrentistaController@salvarCorrentista");

Route::get('/', function () {
    return view('welcome');
});
