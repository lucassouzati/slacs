@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Contestacao</div>
                    <div class="panel-body">
                        <a href="{{ url('/contestacao/create') }}" class="btn btn-success btn-sm" title="Cadastrar Contestacao">
                            <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/contestacao', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Data</th><th>Status</th><th>Observacao</th><th>Resposta</th><th>Licitacao Id</th><th>Contrato Id</th><th>Cidadao Id</th><th>Colaborador Id</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($contestacao as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->data }}</td><td>{{ $item->status }}</td><td>{{ $item->observacao }}</td><td>{{ $item->resposta }}</td><td>{{ $item->licitacao_id }}</td><td>{{ $item->contrato_id }}</td><td>{{ $item->cidadao_id }}</td><td>{{ $item->colaborador_id }}</td>
                                        <td>
                                            <a href="{{ url('/contestacao/' . $item->id) }}" title="Visualizar Contestacao"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</button></a>
                                            <a href="{{ url('/contestacao/' . $item->id . '/edit') }}" title="Editar Contestacao"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/contestacao', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Excluir Contestacao',
                                                        'onclick'=>'return confirm("Confirma exclusão?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $contestacao->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
