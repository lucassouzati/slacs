@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Licitaco {{ $licitaco->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/licitacoes') }}" title="Voltar"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <a href="{{ url('/licitacoes/' . $licitaco->id . '/edit') }}" title="Editar Licitaco"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['licitacoes', $licitaco->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Excluir Licitaco',
                                    'onclick'=>'return confirm("Confirma exclusão?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $licitaco->id }}</td>
                                    </tr>
                                    <tr><th> Ente Público </th><td> {{ $licitaco->ente->nome }} </td></tr>
                                    <tr><th> Unidade Gestora </th><td> {{ $licitaco->unidade_gestora }} </td></tr>
                                    <tr><th> Número de processo </th><td> {{ $licitaco->num_proc }} </td></tr>
                                    <tr><th> Modalidade </th><td> {{ $licitaco->modalidade }} </td></tr>
                                    <tr><th> Tipo </th><td> {{ $licitaco->modalidade }} </td></tr>
                                    <tr><th> Situação </th><td> {{ $licitaco->situacao }} </td></tr>
                                    <tr><th> Data de julgamento </th><td> {{ $licitaco->data_julgamento }} </td></tr>
                                    <tr><th> Data de homologação </th><td> {{ $licitaco->data_homologacao }} </td></tr>
                                    <tr><th> Objeto </th><td> {{ $licitaco->objeto }} </td></tr>
                                    <tr><th> Valor </th><td> {{ $licitaco->valor }} </td></tr>
                                    <tr><th> Critério </th><td> {{ $licitaco->criterio }} </td></tr>
                                    <tr><th> Prazo de execução </th><td> {{ $licitaco->prazo_execucao }} </td></tr>
                                    <tr><th> Tipo de cadastro </th><td> {{ $licitaco->tipo_cadastro }} </td></tr>
                                    <tr><th> Situação do cadastro </th><td> {{ $licitaco->situacao_cadastro }} </td></tr>
                                    <tr><th> Criado por </th><td> {{ $licitaco->colaborador_criou->nome }} </td></tr>
                                    <tr><th> Validado por </th><td> {{ isset($licitacao->colaborador_validou) ? $licitaco->colaborador_validou->nome : "" }} </td></tr>

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
                    <div class="panel-heading">Itemlicitacao</div>
                    <div class="panel-body">
                        <a href="{{ route('item-licitacao.create', $licitaco->id) }}" class="btn btn-success btn-sm" title="Cadastrar ItemLicitacao">
                            <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Item</th><th>Descricao</th><th>Quantidade</th><th>Unidade Medida</th><th>Valor Unitario</th><th>Valor Proposta Vencedora</th><th>Valor Total</th><th>Licitação</th><th>Tipo Pessoa</th><th>Cnpj Cpf Vencedor</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($licitaco->itensLicitacao as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->item }}</td><td>{{ $item->descricao }}</td><td>{{ $item->quantidade }}</td><td>{{ $item->unidade_medida }}</td><td>{{ $item->valor_unitario }}</td><td>{{ $item->valor_proposta_vencedora }}</td><td>{{ $item->valor_total }}</td><td>{{ $item->licitacao_id }}</td><td>{{ $item->tipo_pessoa_fisica }}</td><td>{{ $item->cnpj_cpf_vencedor }}</td>
                                        <td>
                                            <a href="{{ route('item-licitacao.show', ['licitacao_id' => $licitaco->id, 'id' => $item->id]) }}" title="Visualizar ItemLicitacao"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</button></a>
                                            <a href="{{ route('item-licitacao.edit', ['licitacao_id' => $licitaco->id, 'id' => $item->id]) }}" title="Editar ItemLicitacao"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => route('item-licitacao.destroy', ['licitacao_id' => $licitaco->id, 'id' => $item->id]),
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Excluir ItemLicitacao',
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
