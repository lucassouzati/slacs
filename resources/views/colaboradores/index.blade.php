@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Colaboradores</div>
                    <div class="panel-body">
                        <a href="{{ url('/colaboradores/create') }}" class="btn btn-success btn-sm" title="Cadastrar Colaboradore">
                            <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/colaboradores', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>ID</th><th>Nome</th><th>Cidade</th><th>Email</th><th>Ativo</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($colaboradores as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nome }}</td><td>{{ $item->cidade }}</td><td>{{ $item->email }}</td>
                                        <td>{{$item->ativo? "Sim" : "Não"}}</td>
                                        <td>
                                            <a href="{{ url('/colaboradores/' . $item->id) }}" title="Visualizar Colaboradore"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</button></a>
                                            <a href="{{ url('/colaboradores/' . $item->id . '/edit') }}" title="Editar Colaboradore"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/colaboradores', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Excluir Colaboradore',
                                                        'onclick'=>'return confirm("Confirma exclusão?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                            @if($item->ativo)
                                            <a href="{{route('colaboradores.mudaStatus', ['id' => $item->id, 'ativo' => 0])}}" title="Desativar" class="btn btn-warning btn-xs" onclick="return confirm('Deseja desativar o colaborador?')">Desativar</a>
                                            @else
                                            <a href="{{route('colaboradores.mudaStatus', ['id' => $item->id, 'ativo' => 1])}}" title="Ativar" class="btn btn-success btn-xs" onclick="return confirm('Deseja ativar o colaborador?')">Ativar</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $colaboradores->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
