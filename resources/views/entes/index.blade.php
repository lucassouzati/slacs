@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Entes</div>
                    <div class="panel-body">
                        <a href="{{ url('/entes/create') }}" class="btn btn-success btn-sm" title="Cadastrar Ente">
                            <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar
                        </a>
                        <a href="{{route('entes.exportar')}}" title="Exportar entes para o Coletor" class="btn btn-primary btm-sm">Exportar Entes</a>
                        <a href="{{route('entes.importar')}}" title="Importar entes do Coletor" class="btn btn-primary btm-sm">Importar Entes</a>
                        {!! Form::open(['method' => 'GET', 'url' => '/entes', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>ID</th><th>Nome</th><th>Municipio</th><th>Status</th><th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($entes as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nome }}</td><td>{{ $item->municipio }}</td><td>{{ $item->ativo? "Ativo" : "Inativo" }}</td>
                                        <td>
                                            <a href="{{ url('/entes/' . $item->id) }}" title="Visualizar Ente"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</button></a>
                                            <a href="{{ url('/entes/' . $item->id . '/edit') }}" title="Editar Ente"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/entes', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Excluir Ente',
                                                        'onclick'=>'return confirm("Confirma exclusão?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $entes->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
