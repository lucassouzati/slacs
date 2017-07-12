@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Ente {{ $ente->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/entes') }}" title="Voltar"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <a href="{{ url('/entes/' . $ente->id . '/edit') }}" title="Editar Ente"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['entes', $ente->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Excluir Ente',
                                    'onclick'=>'return confirm("Confirma exclusão?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $ente->id }}</td>
                                    </tr>
                                    <tr><th> Nome </th><td> {{ $ente->nome }} </td></tr>
                                    <tr><th> Municipio </th><td> {{ $ente->municipio }} </td></tr>
                                    <tr><th> Link da Transparencia </th><td> {{ $ente->link_transparencia }} </td></tr>
                                    <tr><th> Link das Licitações </th><td> {{ $ente->link_licitacoes }} </td></tr>
                                    <tr><th> Link dos Contratos </th><td> {{ $ente->link_contratos }} </td></tr>
                                    <tr><th> Esfera </th><td> {{ $ente->esfera }} </td></tr>
                                    <tr><th> Classificacao </th><td> {{ $ente->classificacao }} </td></tr>
                                    <tr><th> Status </th><td> {{ $ente->ativo? "Ativo" : "Inativo" }} </td></tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
