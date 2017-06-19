@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Colaboradore {{ $colaboradore->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/colaboradores') }}" title="Voltar"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <a href="{{ url('/colaboradores/' . $colaboradore->id . '/edit') }}" title="Editar Colaboradore"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['colaboradores', $colaboradore->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Excluir Colaboradore',
                                    'onclick'=>'return confirm("Confirma exclusão?")'
                            ))!!}
                        {!! Form::close() !!}
                        @if($colaboradore->aprovacao_cadastro == 'Pendente')
                            <a href="{{route('colaboradores.aprovacao_cadastro', ['id' => $colaboradore->id, 'aprovacao_cadastro' => 'Aprovado'])}}" title="Aprovar" class="btn btn-success btn-xs">Aprovar</a>
                            <a href="{{route('colaboradores.aprovacao_cadastro', ['id' => $colaboradore->id, 'aprovacao_cadastro' => 'Reprovado'])}}" title="Reprovar" class="btn btn-danger btn-xs">Reprovar</a>
                        @elseif($colaboradore->aprovacao_cadastro == 'Reprovado')
                            <a href="{{route('colaboradores.aprovacao_cadastro', ['id' => $colaboradore->id, 'aprovacao_cadastro' => 'Aprovado'])}}" title="Revogar Reprovação" class="btn btn-warning btn-xs">Revogar Reprovação</a>
                        @endif
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $colaboradore->id }}</td>
                                    </tr>
                                    <tr><th> Nome </th><td> {{ $colaboradore->nome }} </td></tr>
                                    <tr><th> Cidade </th><td> {{ $colaboradore->cidade }} </td></tr>
                                    <tr><th> Email </th><td> {{ $colaboradore->email }} </td></tr>
                                    <tr><th> Ativo? </th><td> {{ $colaboradore->ativo? "Sim" : "Não" }} </td></tr>
                                    <tr><th> Cadastro </th><td> {{ $colaboradore->aprovacao_cadastro  }} </td></tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
