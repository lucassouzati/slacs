@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Responer Contestacao #{{ $contestacao->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/home') }}" title="Voltar"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($contestacao, [
                            'method' => 'POST',
                            'url' => route('contestacao.postResponder', $contestacao->id),
                            'class' => 'form-horizontal',
                        ]) !!}

                        @if($contestacao->tipo == 'contrato')
                        <div class="form-group {{ $errors->has('contrato_id') ? 'has-error' : ''}}">
                            {!! Form::label('contrato_id', 'Contrato', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('contrato_id', [$contestacao->contrato->id => $contestacao->contrato->descricao], null, ['class' => 'form-control']) !!}
                                {!! $errors->first('contrato_id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        @else
                        <div class="form-group {{ $errors->has('licitacao_id') ? 'has-error' : ''}}">
                            {!! Form::label('licitacao_id', 'Contrato', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('licitacao_id', [$contestacao->licitacao->id => $contestacao->licitacao->num_proc], null, ['class' => 'form-control']) !!}
                                {!! $errors->first('licitacao_id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        @endif
                        <div class="form-group {{ $errors->has('observacao') ? 'has-error' : ''}}">
                            {!! Form::label('observacao', 'Observacao', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::textarea('observacao', null, ['class' => 'form-control','disabled' => 'true']) !!}
                                {!! $errors->first('observacao', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div> 
                        <div class="form-group {{ $errors->has('resposta') ? 'has-error' : ''}}">
                            {!! Form::label('resposta', 'Resposta', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::textarea('resposta', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('resposta', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Submeter resposta', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>


                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
