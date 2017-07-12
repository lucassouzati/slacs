@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">ItemLicitacao {{ $itemlicitacao->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/item-licitacao') }}" title="Voltar"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <a href="{{ url('/item-licitacao/' . $itemlicitacao->id . '/edit') }}" title="Editar ItemLicitacao"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['itemlicitacao', $itemlicitacao->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Excluir ItemLicitacao',
                                    'onclick'=>'return confirm("Confirma exclusão?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $itemlicitacao->id }}</td>
                                    </tr>
                                    <tr><th> Item </th><td> {{ $itemlicitacao->item }} </td></tr><tr><th> Descricao </th><td> {{ $itemlicitacao->descricao }} </td></tr><tr><th> Quantidade </th><td> {{ $itemlicitacao->quantidade }} </td></tr><tr><th> Unidade Medida </th><td> {{ $itemlicitacao->unidade_medida }} </td></tr><tr><th> Valor Unitario </th><td> {{ $itemlicitacao->valor_unitario }} </td></tr><tr><th> Valor Proposta Vencedora </th><td> {{ $itemlicitacao->valor_proposta_vencedora }} </td></tr><tr><th> Valor Total </th><td> {{ $itemlicitacao->valor_total }} </td></tr><tr><th> Licitacao Id </th><td> {{ $itemlicitacao->licitacao_id }} </td></tr><tr><th> Tipo Pessoa Fisica </th><td> {{ $itemlicitacao->tipo_pessoa_fisica }} </td></tr><tr><th> Cnpj Cpf Vencedor </th><td> {{ $itemlicitacao->cnpj_cpf_vencedor }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
