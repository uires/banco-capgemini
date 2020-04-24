<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return Correntista::all();
    }
}
