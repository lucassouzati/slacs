@extends('modulo-cidadao.layouts.app2')

@section('content')

    <div class="container">
        <div class="row">
            
                         <div class="panel panel-default">
                    <div class="panel-heading">Filtros</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => route('cidadao.consulta-contratos'), 'method' => 'GET', 'class' => 'form-horizontal']) !!}
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ano" class="control-label">Ente Público: </label>
                                            {!! Form::select('ente_id', \App\Ente::pluck('nome', 'id')->put('', 'Todos'), '', ['class' => 'form-control']) !!}
                                        </div>    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="processo" class="control-label">Processo/Ano: </label>
                                            {!! Form::text('processo', null, ['class' => 'form-control']) !!}
                                        </div>    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="numero_contrato" class="control-label">Contrato/Ano: </label>
                                            {!! Form::text('numero_contrato', null, ['class' => 'form-control']) !!}
                                        </div>    
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ano" class="control-label">Valor Mínimo: </label>
                                            {!! Form::number('valor_minimo', null, ['class' => 'form-control']) !!}
                                        </div>    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ano" class="control-label">Valor Máximo: </label>
                                            {!! Form::number('valor_maximo', null, ['class' => 'form-control']) !!}
                                        </div>    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="tipo" class="control-label">Tipo: </label>
                                            {!! Form::text('tipo', null, ['class' => 'form-control']) !!}
                                        </div>    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="situacao" class="control-label">CNPJ/CPF: </label>
                                            {!! Form::text('cnpj_cpf', null, ['class' => 'form-control']) !!}
                                        </div>    
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fornecedor" class="control-label">Fornecedor: </label>
                                            {!! Form::text('fornecedor', null, ['class' => 'form-control']) !!}
                                        </div>    
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="descricao" class="control-label">Objeto: </label>
                                            {!! Form::text('descricao', null, ['class' => 'form-control']) !!}
                                        </div>    
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ano" class="control-label">Que contenham nos itens: </label>
                                            {!! Form::text('descricao_itens', null, ['class' => 'form-control']) !!}
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
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Contratos</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        	<table class="table table-striped">
                        		<caption>Consulta de Contratos</caption>
                        		<thead>
                        			<tr>
                                        <th>Ente Público</th>
                                        <th>Data Emissao</th>
                                        <th>Numero Contrato</th>
                                        <th>Tipo</th>
                                        <th>Fornecedor</th>
                                        <th>Cnpj/Cpf</th>
                                        <th>Valor</th>
                                        <th></th>
                                    </tr>
                        		</thead>
                        		<tbody>
                        			@foreach($contratos as $item)
                                    <tr>
                                        <td>{{ $item->ente->nome }}</td>
                                        <td>{{ $item->data_emissao }}</td>
                                        <td>{{ $item->numero_contrato }}</td>
                                        <td>{{ $item->tipo }}</td>
                                        <td>{{ $item->fornecedor }}</td>
                                        <td>{{ $item->cnpj_cpf }}</td>
                                        <td>{{ $item->valor }}</td>
                                        <td><a href="{{ route('cidadao.mostra-contrato', $item->id) }}" title="Visualizar Contrato"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</button></a></td>
                                    </tr>
                                    @endforeach
                        		</tbody>
                        	</table>
                        </div>
                    </div>
                    @if(isset($filtros))
                    <div class="pagination-wrapper"> {!! $contratos->appends($filtros)->render() !!} </div>
                    @else
                    <div class="pagination-wrapper"> {!! $contratos->render() !!} </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
 
@endsection