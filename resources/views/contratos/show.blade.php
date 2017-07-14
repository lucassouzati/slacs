@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Contrato {{ $contrato->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/contratos') }}" title="Voltar"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <a href="{{ url('/contratos/' . $contrato->id . '/edit') }}" title="Editar Contrato"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['contratos', $contrato->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Excluir Contrato',
                                    'onclick'=>'return confirm("Confirma exclusão?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $contrato->id }}</td>
                                    </tr>
                                    <tr><th> Ente Público </th><td> {{ $contrato->ente->nome }} </td></tr>
                                    <tr><th> Unidade Gestora </th><td> {{ $contrato->unidade_gestora }} </td></tr>
                                    <tr><th> Data de Emissao </th><td> {{ $contrato->data_emissao }} </td></tr>
                                    <tr><th> Instrumento Contrato </th><td> {{ $contrato->instrumento_contrato }} </td></tr>
                                    <tr><th> Numero Contrato </th><td> {{ $contrato->numero_contrato }} </td></tr>
                                    <tr><th> Data de Expiracao </th><td> {{ $contrato->data_expiracao }} </td></tr>
                                    <tr><th> Tipo </th><td> {{ $contrato->tipo }} </td></tr>
                                    <tr><th> Fornecedor </th><td> {{ $contrato->fornecedor }} </td></tr>
                                    <tr><th> Cnpj Cpf </th><td> {{ $contrato->cnpj_cpf }} </td></tr>
                                    <tr><th> Teve Aditivo </th><td> {{ $contrato->teve_aditivo }} </td></tr>
                                    <tr><th> Processo </th><td> {{ $contrato->processo }} </td></tr>
                                    <tr><th> Valor </th><td> {{ $contrato->valor }} </td></tr>
                                    <tr><th> Descrição </th><td> {{ $contrato->descricao }} </td></tr>
                                    <tr><th> Criado por </th><td> {{ $contrato->colaborador_criou->nome }} </td></tr>
                                    <tr><th> Validado por </th><td> {{ isset($contrato->colaborador_validou) ? $contrato->colaborador_validou->nome : "" }} </td></tr>
                                    @if(isset($contrato->licitacao))
                                    <tr><th> Licitação vinculada </th><td> <a href="{{route('licitacoes.show', $contrato->licitacao->id)}}" title=""></a> </td></tr>
                                    @endif
                                    <tr><th> Número da Licitação </th><td> {{ $contrato->numero_licitacao }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Itens do contrato {{$contrato->id}}</div>
                    <div class="panel-body">
                        <a href="{{ route('item-contrato.create', $contrato->id) }}" class="btn btn-success btn-sm" title="Cadastrar ItemContrato">
                            <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Item</th>
                                        <th>Quantidade</th>
                                        <th>Valor Unitario</th>
                                        <th>Valor Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($contrato->itensContrato as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->item }}</td>
                                        <td>{{ $item->quantidade }}</td>
                                        <td>{{ $item->valor_unitario }}</td>
                                        <td>{{ $item->valor_total }}</td>
                                        <td>
                                            <a href="{{ route('item-contrato.show', ['contrato_id' =>$contrato->id, 'id' => $item->id]) }}" title="Visualizar ItemContrato"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</button></a>
                                            <a href="{{ route('item-contrato.edit', ['contrato_id' =>$contrato->id, 'id' => $item->id]) }}" title="Editar ItemContrato"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => route('item-contrato.destroy', ['contrato_id' =>$contrato->id, 'id' => $item->id]),
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
