<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CapturaArtigoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        
    }

    public function init()
    {
        return view('captura_artigo');
    }

    // index – Lista os dados da tabela
    // show – Mostra um item específco
    // create – Retorna a View para criar um item da tabela
    // store – Salva o novo item na tabela
    // edit – Retorna a View para edição do dado
    // update – Salva a atualização do dado
    // destroy – Remove o dado
}
