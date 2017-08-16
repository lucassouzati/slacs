@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Configuração</div>
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

                        {!! Form::model($configuracao, [
                            'method' => 'POST',
                            'url' => route('configuracao.update'),
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        <div class="form-group {{ $errors->has('frequencia') ? 'has-error' : ''}}">
                            {!! Form::label('frequencia', 'Frequência', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('frequencia', ['Diária' => 'Diária', 'Semanal' => 'Semanal'], $configuracao->frequencia, ['class' => 'form-control']) !!}
                                {!! $errors->first('frequencia', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('horario') ? 'has-error' : ''}}">
                            {!! Form::label('horario', 'Hórário', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('horario', $configuracao->horario, ['class' => 'form-control','required' => 'required']) !!}
                                {!! $errors->first('horario', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Atualizar', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
