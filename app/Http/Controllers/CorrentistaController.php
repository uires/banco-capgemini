<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests;
use App\Correntista;
use App\ContaCorrente;

class CorrentistaController extends Controller
{   
    /*
        @despction: buscar todos os correntistas
        @author: uíres
        @routePath: /correntistas
    */
    public function index()
    {
        /*
        $correntista = [
            'nome' => 'Poliana da Silva',
            'email' => 'poli@gmail.com',
            'username' => 'poli.silva',
            'password' => Hash::make('220132')
        ];
        echo Hash::make('220132');exit;
        Correntista::create($correntista);
        */
        return Correntista::all();
    }
}
