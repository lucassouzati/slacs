@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Licitaco #{{ $licitaco->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/licitacoes') }}" title="Voltar"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($licitaco, [
                            'method' => 'PATCH',
                            'url' => ['/licitacoes', $licitaco->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('licitacoes.form', ['submitButtonText' => 'Atualizar'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
