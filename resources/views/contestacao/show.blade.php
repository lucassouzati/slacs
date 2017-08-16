@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Contestacao {{ $contestacao->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/contestacao') }}" title="Voltar"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <a href="{{ url('/contestacao/' . $contestacao->id . '/edit') }}" title="Editar Contestacao"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['contestacao', $contestacao->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Excluir Contestacao',
                                    'onclick'=>'return confirm("Confirma exclusão?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $contestacao->id }}</td>
                                    </tr>
                                    <tr><th> Data </th><td> {{ $contestacao->data }} </td></tr><tr><th> Status </th><td> {{ $contestacao->status }} </td></tr><tr><th> Observacao </th><td> {{ $contestacao->observacao }} </td></tr><tr><th> Resposta </th><td> {{ $contestacao->resposta }} </td></tr><tr><th> Licitacao Id </th><td> {{ $contestacao->licitacao_id }} </td></tr><tr><th> Contrato Id </th><td> {{ $contestacao->contrato_id }} </td></tr><tr><th> Cidadao Id </th><td> {{ $contestacao->cidadao_id }} </td></tr><tr><th> Colaborador Id </th><td> {{ $contestacao->colaborador_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
