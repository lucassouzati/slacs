@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">ItemContrato {{ $itemcontrato->id }}</div>
                    <div class="panel-body">

                        <a href="{{ route('contratos.show', $contrato_id)}}" title="Voltar"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <a href="{{ route('contratos.edit', ['contrato_id' =>  $contrato_id, 'id' => $itemcontrato->id]) }}" title="Editar ItemContrato"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => route('contratos.destroy', ['contrato_id' =>  $contrato_id, 'id' => $itemcontrato->id]),
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Excluir ItemContrato',
                                    'onclick'=>'return confirm("Confirma exclusão?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $itemcontrato->id }}</td>
                                    </tr>
                                    <tr><th> Item </th><td> {{ $itemcontrato->item }} </td></tr>
                                    <tr><th> Exercicio </th><td> {{ $itemcontrato->exercicio }} </td></tr>
                                    <tr><th> Descricao </th><td> {{ $itemcontrato->descricao }} </td></tr>
                                    <tr><th> Quantidade </th><td> {{ $itemcontrato->quantidade }} </td></tr>
                                    <tr><th> Unidade Medida </th><td> {{ $itemcontrato->unidade_medida }} </td></tr>
                                    <tr><th> Valor Unitario </th><td> {{ $itemcontrato->valor_unitario }} </td></tr>
                                    <tr><th> Valor Total </th><td> {{ $itemcontrato->valor_total }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
