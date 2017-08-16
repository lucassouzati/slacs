@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Suas contestações</div>

                <div class="panel-body">
                    @foreach($contestacoes as $item)
                        <div class="panel">
                            <div class="panel-body no-padding-top">
                                <div class="col-md-12">
                                    <div class="col-md-9 pull-left">
                                        <h3>Contestação {{$item->id}}</h3>
                                          <b>Status</b>: {{$item->status}}
                                    </div>
                                    
                                </div>
                                <div class="col-md-12">
                                    @if($item->tipo == 'contrato')
                                    <div class="col-md-5 pull-left">
                                        <b>Nome do Ente:</b> {{$item->contrato->ente->nome}}
                                    </div>
                                    <div class="col-md-4 pull-left">
                                        <b>Nº Contrato:</b> {{$item->contrato->numero_contrato}}
                                    </div>
                                    @else
                                    <div class="col-md-5 pull-left">
                                        <b>Nome do Ente:</b> {{$item->licitacao->ente->nome}}
                                    </div>
                                    <div class="col-md-4 pull-left">
                                        <b>Nº Contrato:</b> {{$item->licitacao->num_proc}}
                                    </div>
                                    @endif
                                    <div class="col-md-2 pull-left">
                                        <b>Data:</b> {{$item->data}}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <b">Observação: </b><p style="word-wrap:break-word;"> {{$item->observacao}}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <b style="word-wrap:break-word; ">Resposta:</b> <p style="word-wrap:break-word;">{{$item->resposta}}</p>
                                    </div>
                                    

                                </div>
                                    <div class="col-md-12">
                                        <div class="col-md-4 col-md-offset-6">
                                            <b>Respondido por:</b> {{isset($item->colaborador) ? $item->colaborador->nome : ''}}
                                        </div>
                                    </div>
                                
                            </div>
                            
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
