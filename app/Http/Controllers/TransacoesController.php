<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TransacaoBancaria;

class TransacoesController extends Controller
{
    public function index()
    {

        return TransacaoBancaria::select()->where('conta_corrente_id', 1)->get();
    }
}
