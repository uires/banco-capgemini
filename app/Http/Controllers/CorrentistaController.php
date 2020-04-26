<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests;
use App\Correntista;
use App\ContaCorrente;

class CorrentistaController extends Controller
{   

    public function buscarCorrentista(Request $request, $email)
    {
        
        return Correntista::where('email', '=', $email)->with('contaCorrente')->firstOrFail();
    }
}
