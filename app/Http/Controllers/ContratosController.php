<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Contrato;
use App\ItemContrato;
use App\Ente;
use App\Licitacao;
use Illuminate\Http\Request;
use Session;
use \XmlParser; 

class ContratosController extends Controller
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
            $contratos = Contrato::where('unidade_gestora', 'LIKE', "%$keyword%")
				->orWhere('data_emissao', 'LIKE', "%$keyword%")
				->orWhere('instrumento_contrato', 'LIKE', "%$keyword%")
				->orWhere('numero_contrato', 'LIKE', "%$keyword%")
				->orWhere('data_expiracao', 'LIKE', "%$keyword%")
				->orWhere('tipo', 'LIKE', "%$keyword%")
				->orWhere('fornecedor', 'LIKE', "%$keyword%")
				->orWhere('cnpj_cpf', 'LIKE', "%$keyword%")
				->orWhere('teve_aditivo', 'LIKE', "%$keyword%")
				->orWhere('processo', 'LIKE', "%$keyword%")
				->orWhere('valor', 'LIKE', "%$keyword%")
				->orWhere('descricao', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $contratos = Contrato::paginate($perPage);
        }

        return view('contratos.index', compact('contratos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $entes = Ente::all();
        $licitacoes = Licitacao::all();
        return view('contratos.create', compact('entes', 'licitacoes'));
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
        $this->validate($request, [
            'processo' => 'required', 
            'cnpj_cpf' => 'required', 
            'data_emissao' => 'date_format:d/m/Y', 
            'data_expiracao' => 'date_format:d/m/Y', 
            //'objeto' => '',
            'ente_id' => 'required', 
            ]);
        
        $requestData = $request->all();
        //dd($requestData);
        $requestData = array_add($requestData, "colaborador_criou_id", auth()->user()->id);
        $requestData = array_add($requestData, "tipo_cadastro", "Manual");
        
        
        Contrato::create($requestData);

        \Session::flash('flash_message',[
            'msg'=>"Contrato cadastrado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('contratos');
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
        $contrato = Contrato::findOrFail($id);

        return view('contratos.show', compact('contrato'));
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
        $contrato = Contrato::findOrFail($id);
        $entes = Ente::all();
        $licitacoes = Licitacao::all();

        return view('contratos.edit', compact('contrato', 'entes', 'licitacoes'));
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
        
        $contrato = Contrato::findOrFail($id);
        $contrato->update($requestData);

        \Session::flash('flash_message',[
            'msg'=>"Contrato atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('contratos');
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
        Contrato::destroy($id);

        \Session::flash('flash_message',[
            'msg'=>"Contrato excluído com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('contratos');
    }

    public function formImportar()
    {
        $entes = Ente::all();
        return view('contratos.importacao', compact('entes'));
    }

    public function importar(Request $request)
    {
        $requestData = $request->all();
        // dd($requestData);
        if($requestData['formato'] == 'XML')
        {
            // $xml = XmlParser::load($requestData['arquivo']);
            $data = file_get_contents($requestData['arquivo']);
            $xml = simplexml_load_string($data);
            // dd($xml);
            // $registros = $xml->getContent();
            // dd($xml);
            $licitacoes = [];
            for($i = 0; $i<$xml->count(); $i++){
                # code...   
                // if($i == 3)
                // {
                    // dd($xml->ProcessoLicitatorio[$i]->UnidadeGestora->__toString());    
                // }
                $licitacoes[$i] = Licitacao::create(
                ['unidade_gestora' => $xml->ProcessoLicitatorio[$i]->UnidadeGestora->__toString(),
                 'num_proc' => $xml->ProcessoLicitatorio[$i]->NumeroProcesso->__toString(),
                 'modalidade' => $xml->ProcessoLicitatorio[$i]->Modalidade->__toString(),
                 'tipo' => $xml->ProcessoLicitatorio[$i]->Finalidade->__toString(),
                 'situacao' => $xml->ProcessoLicitatorio[$i]->SituacaoProcesso->__toString(),
                 'data_julgamento' => $xml->ProcessoLicitatorio[$i]->DataJulgamento->__toString(),
                 'data_homologacao' => $xml->ProcessoLicitatorio[$i]->DataHomologacao->__toString(),
                 'objeto' => $xml->ProcessoLicitatorio[$i]->Objeto->__toString(),
                 'valor' => $xml->ProcessoLicitatorio[$i]->ValorProcesso->__toString(),
                 'criterio' => $xml->ProcessoLicitatorio[$i]->CriterioJulgamento->__toString(),
                 'prazo_execucao' => $xml->ProcessoLicitatorio[$i]->PrazoExecucao->__toString(),
                 'ente_id' => $requestData['ente_id'],
                 'tipo_cadastro' => 'Importado',
                 'situacao_cadastro' => 'Não validado',
                 'colaborador_criou_id' => auth()->user()->id,
                 ]
                );

                if(isset($xml->ProcessoLicitatorio[$i]->InstrumentosContratuais))
                {
                    $contratos = [];
                    $contratos_xml = $xml->ProcessoLicitatorio[$i]->InstrumentosContratuais[0];
                    // dd($contratos_xml);
                    // dd($contratos_xml->InstrumentoContratual[0]->NumeroLicitatorio->__toString());
                    for($j = 0; $j<$contratos_xml->count(); $j++){
                        $contratos[$j] = Contrato::create(
                            ['unidade_gestora' => $contratos_xml->InstrumentoContratual[$j]->UnidadeGestora->__toString(),
                             'data_emissao' => $contratos_xml->InstrumentoContratual[$j]->DataEmissao->__toString(),
                             'instrumento_contrato' => $contratos_xml->InstrumentoContratual[$j]->TipoInstrumentoContratual->__toString(),
                             'numero_contrato' => $contratos_xml->InstrumentoContratual[$j]->NumeroInstrumentoContratual->__toString(),
                             'data_expiracao' => $contratos_xml->InstrumentoContratual[$j]->DataExpiracao->__toString(),
                             'tipo' => $contratos_xml->InstrumentoContratual[$j]->TipoContrato->__toString(),
                             'fornecedor' => $contratos_xml->InstrumentoContratual[$j]->NomeFornecedor->__toString(),
                             'cnpj_cpf' => $contratos_xml->InstrumentoContratual[$j]->CNPJFornecedor->__toString(),
                             'teve_aditivo' => $contratos_xml->InstrumentoContratual[$j]->PossuiAditivo->__toString() == 'SIM' ? 1 : 0,
                             'processo' => $contratos_xml->InstrumentoContratual[$j]->NumeroLicitatorio->__toString(),
                             'valor' => $contratos_xml->InstrumentoContratual[$j]->ValorInstrumentoContratual->__toString(),
                             'descricao' => $contratos_xml->InstrumentoContratual[$j]->Objeto->__toString(),
                             'ente_id' => $requestData['ente_id'],
                             'colaborador_criou_id' => auth()->user()->id,
                             'licitacao_id' => $licitacoes[$i]->id,
                             'numero_licitacao' => $contratos_xml->InstrumentoContratual[$j]->NumeroLicitatorio->__toString(),
                             'tipo_cadastro' => 'Importado',
                             ]
                        );
                        if(isset($contratos_xml->InstrumentoContratual[$j]->ItensAdquiridos))

                        {
                            $itens_contrato_xml = $contratos_xml->InstrumentoContratual[$j]->ItensAdquiridos;
                            // dd($itens_contrato_xml);
                            $itens_contrato = [];
                            for($k = 0; $k<$itens_contrato_xml->count(); $k++)
                            {
                                $itens_contrato[$k] = ItemContrato::create(
                                ['item' => $itens_contrato_xml->Item[$k]->NumeroItem->__toString(),
                                 // 'exercicio' => $itens_contrato_xml->Item[$k]->,
                                 'descricao' => $itens_contrato_xml->Item[$k]->Identificacao->__toString(),
                                 'quantidade' => $itens_contrato_xml->Item[$k]->Quantidade->__toString(),
                                 // 'unidade_medida' => $itens_contrato_xml->Item[$k]->,
                                 'valor_unitario' => $itens_contrato_xml->Item[$k]->ValorUnitario->__toString(),
                                 'valor_total' => $itens_contrato_xml->Item[$k]->ValorTotal->__toString(),
                                 'contrato_id' => $contratos[$j]->id,
                                 ]
                                );
                            }
                            $contratos[$j]->itens_contratos_array = $itens_contrato;
                        }

                    }
                    // dd($contratos);
                    $licitacoes[$i]->contratos_array = $contratos;
                }
            //}
                // protected $fillable = ['unidade_gestora', 'data_emissao', 'instrumento_contrato', 'numero_contrato', 'data_expiracao', 'tipo', 'fornecedor', 'cnpj_cpf', 'teve_aditivo', 'processo', 'valor', 'descricao', 'ente_id', 'colaborador_criou_id', 'colaborador_validou_id', 'licitacao_id', 'numero_licitacao'];
            }
            // dd($licitacoes);

            // dd($xml->parse(['processos_licitatorios' => ['uses' => 'ProcessoLicitatorio.UnidadeGestora']]));
            \Session::flash('flash_message',[
            'msg'=>"Arquivo importado com sucesso!",
            'class'=>"alert-success"
            ]);

            return redirect('home');
        }

    }
}
