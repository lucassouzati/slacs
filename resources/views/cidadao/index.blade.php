@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Cidadao</div>
                    <div class="panel-body">
                        <a href="{{ url('/cidadao/create') }}" class="btn btn-success btn-sm" title="Cadastrar Cidadao">
                            <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/cidadao', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>ID</th><th>Nome</th><th>Email</th><th>Password</th><th>Cidade</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($cidadao as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nome }}</td><td>{{ $item->email }}</td><td>{{ $item->password }}</td><td>{{ $item->cidade }}</td>
                                        <td>
                                            <a href="{{ url('/cidadao/' . $item->id) }}" title="Visualizar Cidadao"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</button></a>
                                            <a href="{{ url('/cidadao/' . $item->id . '/edit') }}" title="Editar Cidadao"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/cidadao', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Excluir Cidadao',
                                                        'onclick'=>'return confirm("Confirma exclusão?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $cidadao->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
