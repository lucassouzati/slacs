@extends('modulo-cidadao.layouts.app2')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                    <div class="panel-heading">Filtros</div>
                    <div class="panel-body">
                    {!! Form::open(['url' => route('cidadao.historicos_de_acesso'), 'method' => 'GET', 'class' => 'form-horizontal']) !!}
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ano" class="control-label">Ente Público: </label>
                                    {!! Form::select('ente_id', \App\Ente::pluck('nome', 'id')->put('', 'Todos'), '', ['class' => 'form-control']) !!}
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data_inicio" class="control-label">Data Inicio: </label>
                                    {!! Form::text('data_inicio', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data_inicio" class="control-label">Data Fim: </label>
                                    {!! Form::text('data_fim', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-offset-10 col-md-2">
                                <div class="form-group">
                                    {!! Form::submit('Pesquisar', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    </div>
            </div>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <div class="panel">
                    <div class="panel-heading">Históricos de Acesso</div>
                    <div class="panel-body">
                    <a href="{{ route('historicos_de_acesso.importar') }}" class="btn btn-success btn-sm" title="Importar Históricos">
                            <i class="fa fa-plus" aria-hidden="true"></i> Importar Hístóricos
                        </a>
                        <br/>
                        <br/>
                        @foreach($historicos_de_acesso as $item)
                        <div class="panel">
                            <div class="panel-body no-padding-top">
                                <div class="col-md-12">
                                    <div class="col-md-3 pull-left">
                                        <h3>ID: {{$item->id}}</h3>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5 pull-left">
                                        <b>Nome do Ente:</b> {{$item->ente->nome}}
                                    </div>
                                    <div class="col-md-4 pull-left">
                                        <b>Municipio:</b> {{$item->ente->municipio}}
                                    </div>
                                    <div class="col-md-2 pull-left">
                                        <b>Classificação Atual:</b> {{$item->ente->classificacao}}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <b>Licitações disponíveis?</b> {{$item->licitacoes? "Sim" : "Não"}}
                                    </div>
                                    <div class="col-md-4">
                                        <b>Contratos disponíveis?</b> {{$item->contratos? "Sim" : "Não"}}
                                    </div>
                                    <div class="col-md-4">
                                        <b>Dados abertos disponíveis?</b> {{$item->transparencia? "Sim" : "Não"}}
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4 pull-left">
                                        <b>Data de Acesso:</b> {{$item->data_hora}}
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach

                            <div class="pagination-wrapper"> {!! $historicos_de_acesso->appends(['search' => Request::get('search')])->render() !!} </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
