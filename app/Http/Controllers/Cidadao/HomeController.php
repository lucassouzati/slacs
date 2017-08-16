<?php

namespace App\Http\Controllers\Cidadao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cidadao;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.cidadao');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contestacoes = auth()->guard('cidadao')->user()->contestacoes()->with(['licitacao', 'contrato'])->get();
        // dd(\App\Contestacao::all());
        return view('cidadao.home', compact('contestacoes'));
    }
}
