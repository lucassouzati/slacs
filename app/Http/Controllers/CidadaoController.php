<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cidadao;
use App\Ente;
use App\Licitacao;
use App\Contrato;
use App\ItemLicitacao;
use App\ItemContrato;
use App\HistoricoDeAcesso;
use Illuminate\Http\Request;
use Session;
use DB;

class CidadaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $cidadao = Cidadao::where('nome', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('password', 'LIKE', "%$keyword%")
				->orWhere('cidade', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $cidadao = Cidadao::paginate($perPage);
        }

        return view('cidadao.index', compact('cidadao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cidadao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Cidadao::create($requestData);

        \Session::flash('flash_message',[
            'msg'=>"Cidadao cadastrado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('cidadao');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $cidadao = Cidadao::findOrFail($id);

        return view('cidadao.show', compact('cidadao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $cidadao = Cidadao::findOrFail($id);

        return view('cidadao.edit', compact('cidadao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $cidadao = Cidadao::findOrFail($id);
        $cidadao->update($requestData);

        \Session::flash('flash_message',[
            'msg'=>"Cidadao atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('cidadao');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Cidadao::destroy($id);

        \Session::flash('flash_message',[
            'msg'=>"Cidadao excluído com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('cidadao');
    }

    public function consultaLicitacoes(Request $request = null)
    {
        $filtros = $request->all();

        if(empty($filtros))
        {
            $licitacoes = Licitacao::paginate(40);    
            return view('modulo-cidadao.licitacao', compact('licitacoes'));
        }
        else
        {
            $licitacoes = Licitacao::when(isset($filtros['ente_id']), function ($query) use ($filtros) {
                    return $query->where('ente_id', $filtros['ente_id']);
                })
            ->when(isset($filtros['modalidade']), function($query) use ($filtros){
                return  $query->where('modalidade', 'LIKE', "%".$filtros['modalidade']."%");
            })
            ->when(isset($filtros['situacao']), function($query) use ($filtros){
                return  $query->where('situacao', 'LIKE', "%".$filtros['situacao']."%");
            })
            ->when(isset($filtros['criterio']), function($query) use ($filtros){
                return  $query->where('criterio', 'LIKE', "%".$filtros['criterio']."%");
            })
            ->when(isset($filtros['objeto']), function($query) use ($filtros){
                return  $query->where('objeto', 'LIKE', "%".$filtros['objeto']."%");
            })
           ->when(isset($filtros['valor_minimo']), function($query) use ($filtros){
                return  $query->where('valor', '>', $filtros['valor_minimo']);
            })
            ->when(isset($filtros['valor_maximo']), function($query) use ($filtros){
                return  $query->where('valor', '<', $filtros['valor_maximo']);
            })
            ->when(isset($filtros['cnpj_cpf']), function($query) use ($filtros){
                return $query->join('item_licitacaos', function($join) use ($filtros){
                    $join->on('licitacoes.id', '=', 'item_licitacaos.licitacao_id')
                    ->where('cnpj_cpf', 'LIKE', '%'.$filtros['cnpj_cpf'].'%');
                });
            })
            ->when(isset($filtros['descricao_itens']), function($query) use ($filtros){
                return $query->join('item_licitacaos', function($join) use ($filtros){
                    $join->on('licitacoes.id', '=', 'item_licitacaos.licitacao_id')
                    ->where('descricao', 'LIKE', '%'.$filtros['descricao_itens'].'%');
                });
            })
            ->paginate(40);
            return view('modulo-cidadao.licitacao', compact('licitacoes', 'filtros'));
        }
        
    }
    
    public function consultaContratos(Request $request = null)
    {
        $filtros = $request->all();

        if(empty($filtros))
        {
            $contratos = Contrato::paginate(40);    
            return view('modulo-cidadao.contrato', compact('contratos'));
        }
        else
        {
            $contratos = Contrato::when(isset($filtros['ente_id']), function ($query) use ($filtros) {
                    return $query->where('ente_id', $filtros['ente_id']);
                })
            ->when(isset($filtros['processo']), function($query) use ($filtros){
                return  $query->where('processo', 'LIKE', "%".$filtros['processo']."%");
            })
            ->when(isset($filtros['numero_contrato']), function($query) use ($filtros){
                return  $query->where('numero_contrato', 'LIKE', "%".$filtros['numero_contrato']."%");
            })
            ->when(isset($filtros['tipo']), function($query) use ($filtros){
                return  $query->where('tipo', 'LIKE', "%".$filtros['tipo']."%");
            })
            ->when(isset($filtros['cnpj_cpf']), function($query) use ($filtros){
                return  $query->where('cnpj_cpf', 'LIKE', "%".$filtros['cnpj_cpf']."%");
            })
            ->when(isset($filtros['fornecedor']), function($query) use ($filtros){
                return  $query->where('fornecedor', 'LIKE', "%".$filtros['fornecedor']."%");
            })
            ->when(isset($filtros['descricao']), function($query) use ($filtros){
                return  $query->where('contratos.descricao', 'LIKE', "%".$filtros['descricao']."%");
            })
            // ->when($filtros['valor_minimo'] != '' || $filtros['valor_maximo'] != '', function ($query) use ($filtros) {
            //         if($filtros['valor_maximo'] == '' && $filtros['valor_minimo'] != '')
            //         {
            //             return $query->where('valor', '>', $filtros['valor_minimo']);    
            //         }
            //         else if($filtros['valor_maximo'] != '' && $filtros['valor_minimo'] == '')
            //         {
            //             return $query->where('valor', '<', $filtros['valor_maximo']);    
            //         }
            //         else{
            //             return $query->where('valor', '>', $filtros['valor_minimo'])
            //             ->where('valor', '<', $filtros['valor_maximo']);
            //         }
            //     })
            ->when(isset($filtros['valor_minimo']), function($query) use ($filtros){
                return  $query->where('valor', '>', $filtros['valor_minimo']);
            })
            ->when(isset($filtros['valor_maximo']), function($query) use ($filtros){
                return  $query->where('valor', '<', $filtros['valor_maximo']);
            })
            ->when(isset($filtros['descricao_itens']), function($query) use ($filtros){
                return $query->join('item_contratos', function($join) use ($filtros){
                    $join->on('contratos.id', '=', 'item_contratos.contrato_id')
                    ->where('item_contratos.descricao', 'LIKE', '%'.$filtros['descricao_itens'].'%');
                });
            })
            ->paginate(40);
            return view('modulo-cidadao.contrato', compact('contratos', 'filtros'));
        }
        
    }

    public function mostraLicitacao($id)
    {
        $licitacao = Licitacao::find($id);

        return view('modulo-cidadao.mostra_licitacao', compact('licitacao'));
    }

    public function mostraContrato($id)
    {
        $contrato = Contrato::find($id);

        return view('modulo-cidadao.mostra_contrato', compact('contrato'));
    }

    public function apiLicitacoes(Request $request)
    {
        $filtros = $request->all();

        if(empty($filtros))
        {
            $licitacoes = Licitacao::all();    
        }
        else
        {
            $licitacoes = Licitacao::when(isset($filtros['ente_id']), function ($query) use ($filtros) {
                    return $query->where('ente_id', $filtros['ente_id']);
                })
            ->when(isset($filtros['modalidade']), function($query) use ($filtros){
                return  $query->where('modalidade', 'LIKE', "%".$filtros['modalidade']."%");
            })
            ->when(isset($filtros['situacao']), function($query) use ($filtros){
                return  $query->where('situacao', 'LIKE', "%".$filtros['situacao']."%");
            })
            ->when(isset($filtros['criterio']), function($query) use ($filtros){
                return  $query->where('criterio', 'LIKE', "%".$filtros['criterio']."%");
            })
            ->when(isset($filtros['objeto']), function($query) use ($filtros){
                return  $query->where('objeto', 'LIKE', "%".$filtros['objeto']."%");
            })
           ->when(isset($filtros['valor_minimo']), function($query) use ($filtros){
                return  $query->where('valor', '>', $filtros['valor_minimo']);
            })
            ->when(isset($filtros['valor_maximo']), function($query) use ($filtros){
                return  $query->where('valor', '<', $filtros['valor_maximo']);
            })
            ->when(isset($filtros['cnpj_cpf']), function($query) use ($filtros){
                return $query->join('item_licitacaos', function($join) use ($filtros){
                    $join->on('licitacoes.id', '=', 'item_licitacaos.licitacao_id')
                    ->where('cnpj_cpf', 'LIKE', '%'.$filtros['cnpj_cpf'].'%');
                });
            })
            ->when(isset($filtros['descricao_itens']), function($query) use ($filtros){
                return $query->join('item_licitacaos', function($join) use ($filtros){
                    $join->on('licitacoes.id', '=', 'item_licitacaos.licitacao_id')
                    ->where('descricao', 'LIKE', '%'.$filtros['descricao_itens'].'%');
                });
            })
            ->get();
            // ->paginate(40);
        }
        return $licitacoes;
    }

    public function apiItensDaLicitacao($id, Request $request = nul)
    {
        $itens_licitacao = Licitacao::find($id)->itensLicitacao;
        return $itens_licitacao;
    }

    public function apiContratos(Request $request = null)
    {
        $filtros = $request->all();

        if(empty($filtros))
        {
            $contratos = Contrato::all();    
        }
        else
        {
            $contratos = Contrato::when(isset($filtros['ente_id']), function ($query) use ($filtros) {
                    return $query->where('ente_id', $filtros['ente_id']);
                })
            ->when(isset($filtros['processo']), function($query) use ($filtros){
                return  $query->where('processo', 'LIKE', "%".$filtros['processo']."%");
            })
            ->when(isset($filtros['numero_contrato']), function($query) use ($filtros){
                return  $query->where('numero_contrato', 'LIKE', "%".$filtros['numero_contrato']."%");
            })
            ->when(isset($filtros['tipo']), function($query) use ($filtros){
                return  $query->where('tipo', 'LIKE', "%".$filtros['tipo']."%");
            })
            ->when(isset($filtros['cnpj_cpf']), function($query) use ($filtros){
                return  $query->where('cnpj_cpf', 'LIKE', "%".$filtros['cnpj_cpf']."%");
            })
            ->when(isset($filtros['fornecedor']), function($query) use ($filtros){
                return  $query->where('fornecedor', 'LIKE', "%".$filtros['fornecedor']."%");
            })
            ->when(isset($filtros['descricao']), function($query) use ($filtros){
                return  $query->where('contratos.descricao', 'LIKE', "%".$filtros['descricao']."%");
            })
            // ->when($filtros['valor_minimo'] != '' || $filtros['valor_maximo'] != '', function ($query) use ($filtros) {
            //         if($filtros['valor_maximo'] == '' && $filtros['valor_minimo'] != '')
            //         {
            //             return $query->where('valor', '>', $filtros['valor_minimo']);    
            //         }
            //         else if($filtros['valor_maximo'] != '' && $filtros['valor_minimo'] == '')
            //         {
            //             return $query->where('valor', '<', $filtros['valor_maximo']);    
            //         }
            //         else{
            //             return $query->where('valor', '>', $filtros['valor_minimo'])
            //             ->where('valor', '<', $filtros['valor_maximo']);
            //         }
            //     })
            ->when(isset($filtros['valor_minimo']), function($query) use ($filtros){
                return  $query->where('valor', '>', $filtros['valor_minimo']);
            })
            ->when(isset($filtros['valor_maximo']), function($query) use ($filtros){
                return  $query->where('valor', '<', $filtros['valor_maximo']);
            })
            ->when(isset($filtros['descricao_itens']), function($query) use ($filtros){
                return $query->join('item_contratos', function($join) use ($filtros){
                    $join->on('contratos.id', '=', 'item_contratos.contrato_id')
                    ->where('item_contratos.descricao', 'LIKE', '%'.$filtros['descricao_itens'].'%');
                });
            })
            ->get();
            // ->paginate(40);
        }
        return $contratos;
    }

    public function apiItensDoContrato($id = null, Request $request = null)
    {
        if(isset($id))
            $itens_contrato = Contrato::find($id)->itensContrato;
        else
        {
            $filtros = $request->all();
            if(empty($filtros))
            {
                $itens_contrato = ItemContrato::all();
            }
            else
            {
                $itens_contrato = ItemContrato::when(isset($filtros['ente_id']), function ($query) use ($filtros){
                    return $query->join('contratos', function($join) use ($filtrons){
                        $join->on('contratos.id', '=', 'item_contratos.id')->where('ente_id', $filtros['ente_id']);
                    });
                })
                ->when(isset($filtros['descricao']), function($query) use ($filtros){
                    return  $query->where('item_contratos.descricao', 'LIKE', "%".$filtros['descricao']."%");
                })   
                ->get();
            }
        }
        return $itens_contrato;
    }

    public function apiEntes(Request $request = null)
    {
        // dd("teste");
        return Ente::all();
    }

    public function consultaEstatisticas()
    {
        return view('modulo-cidadao.estatisticas');

    }

    public function consultaApi()
    {
        return view('modulo-cidadao.api');

    }

    public function consultaHistoricosDeAcesso(Request $request)
    {
        $filtros = $request->all();

        if(empty($filtros))
        {
            $historicos_de_acesso = HistoricoDeAcesso::paginate(50);
        }
        else
        {
            $historicos_de_acesso = HistoricoDeAcesso::when(isset($filtros['ente_id']), function ($query) use ($filtros) {
                return $query->where('ente_id', $filtros['ente_id']);
            })
            ->when(isset($filtros['data_inicio']), function($query) use ($filtros){
                return $query->where('data_hora', '>', $filtros['data_inicio']);
            })
            ->when(isset($filtros['data_fim']), function($query) use ($filtros){
                return $query->where('data_hora', '<', $filtros['data_fim']);
            })
            ->paginate(50);
        }

        return view('modulo-cidadao.historicos_de_acesso', compact('historicos_de_acesso'));
    }

    public function apiValorTotalContratosPorEnte()
    {
        return DB::table('contratos')
        ->select(DB::raw('entes.id, entes.nome, sum(valor) as total'))
        ->join('entes', 'contratos.ente_id', '=', 'entes.id')
        ->groupBy('entes.id')
        ->groupBy('entes.nome')
        ->get();
    }

    public function apiItensMaisCaros($ente_id)
    {
        return DB::table('item_contratos')   
        ->select(DB::raw('item_contratos.descricao, sum(item_contratos.valor_unitario) as valor'))
        ->join('contratos', 'item_contratos.contrato_id', '=', 'contratos.id')
        ->join('entes', function($join) use ($ente_id){
            $join->on('contratos.ente_id', '=', 'entes.id')
            ->where('entes.id', $ente_id);
        })
        ->groupBy('item_contratos.descricao')
        ->orderBy('valor', 'DESC')
        ->limit(10)
        ->get();
    }

    public function apiHistoricoDeAcessoPorEnte($ente_id)
    {
        return DB::table('historico_de_acesso')
        ->select(DB::raw('sum(licitacoes) as licitacoes, sum(contratos) as  contratos, sum(transparencia) as transparencia, entes.id, entes.nome'))
        ->join('entes', function($join) use ($ente_id){
            $join->on('historico_de_acesso.ente_id', '=', 'entes.id')
            ->where('entes.id', $ente_id);
        })
        ->groupBy('entes.id')
        ->groupBy('entes.nome')
        ->get();
    }
}
