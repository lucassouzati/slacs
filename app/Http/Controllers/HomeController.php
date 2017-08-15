<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = [];
        $dados['qtd_licitacoes'] = \App\Licitacao::all()->count();
        $dados['qtd_contratos'] = \App\Contrato::all()->count();

        return view('home', compact('dados'));
    }
}
