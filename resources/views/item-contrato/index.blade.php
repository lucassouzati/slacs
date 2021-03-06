@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Itemcontrato</div>
                    <div class="panel-body">
                        <a href="{{ url('/item-contrato/create') }}" class="btn btn-success btn-sm" title="Cadastrar ItemContrato">
                            <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/item-contrato', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>ID</th><th>Item</th><th>Exercicio</th><th>Descricao</th><th>Quantidade</th><th>Unidade Medida</th><th>Valor Unitario</th><th>Valor Total</th><th>Contrato Id</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($itemcontrato as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->item }}</td><td>{{ $item->exercicio }}</td><td>{{ $item->descricao }}</td><td>{{ $item->quantidade }}</td><td>{{ $item->unidade_medida }}</td><td>{{ $item->valor_unitario }}</td><td>{{ $item->valor_total }}</td><td>{{ $item->contrato_id }}</td>
                                        <td>
                                            <a href="{{ url('/item-contrato/' . $item->id) }}" title="Visualizar ItemContrato"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</button></a>
                                            <a href="{{ url('/item-contrato/' . $item->id . '/edit') }}" title="Editar ItemContrato"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/item-contrato', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Excluir ItemContrato',
                                                        'onclick'=>'return confirm("Confirma exclusão?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $itemcontrato->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
