@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar ItemLicitacao #{{ $itemlicitacao->id }}</div>
                    <div class="panel-body">
                        <a href="{{ route('licitacoes.show', $licitacao_id) }}" title="Voltar"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($itemlicitacao, [
                            'method' => 'PATCH',
                            'url' => route('item-licitacao.update', ['licitacao_id' => $licitacao_id, 'id' => $itemlicitacao->id]),
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('item-licitacao.form', ['submitButtonText' => 'Atualizar'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
