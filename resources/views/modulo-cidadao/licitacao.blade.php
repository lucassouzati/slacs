@extends('modulo-cidadao.layouts.app2')

@section('content')

    <div class="container">
        <div class="row">
            
             <div class="panel panel-default">
                    <div class="panel-heading">Filtros</div>

                    <div class="panel-body">
                        {{-- {!! Form::open(['url' => '/processos/search', 'method' => 'GET', 'class' => 'form-horizontal']) !!} --}}
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ano" class="control-label">Ente: </label>
                                            {!! Form::select('setor_atual_id', \App\Ente::pluck('nome', 'id')->put('', 'Todos'), '', ['class' => 'form-control']) !!}
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
                            {{-- {!! Form::close() !!} --}}
                    </div>
                </div>

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Licitações</div>
                    <div class="panel-body">
	                    <div class="table-responsive">
	                    	<table class="table table-striped">
	                    		<caption>Consulta de Licitações</caption>
	                    		<thead>
	                    			<tr>
	                                    <th>Unidade Gestora</th>
	                                    <th>Modalidade</th>
	                                    <th>Situação</th>
	                                    <th>Valor</th>
	                                    <th></th>
	                                </tr>
	                    		</thead>
	                    		<tbody>
	                    			@foreach($licitacoes as $item)
	                                <tr>
	                                    <td>{{ $item->unidade_gestora }}</td>
	                                    <td>{{ $item->modalidade }}</td>
	                                    <td>{{ $item->situacao }}</td>
	                                    <td>{{ $item->valor }}</td>
	                                    <td><a href="{{ route('cidadao.mostra-licitacao', $item->id) }}" title="Visualizar Licitaco"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</button></a></td>
	                                </tr>
	                                @endforeach
	                    		</tbody>
	                    	</table>
	                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
 
 
@endsection