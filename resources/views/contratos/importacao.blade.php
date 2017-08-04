@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Importação de Arquivo</div>
                    <div class="panel-body">
                        <a href="{{ route('contratos.index') }}" title="Voltar"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open([route('contratos.importar'), 'class' => 'form-horizontal', 'files' => true]) !!}
                            <div class="form-group {{ $errors->has('ente_id') ? 'has-error' : ''}}">
                                {!! Form::label('ente_id', 'Ente Público', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('ente_id', $entes->pluck('nome', 'id')->prepend("", ""), null, ['class' => 'form-control', 'required' => 'required']) !!}
                                    {!! $errors->first('ente_id', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('tipo_registro') ? 'has-error' : ''}}">
                                {!! Form::label('tipo_registro', 'Tipo de Registro', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('tipo_registro', ['licitacao' => 'Licitações', 'contrato', 'Contratos'], null, ['class' => 'form-control', 'required' => 'required']) !!}
                                    {!! $errors->first('tipo_registro', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('formato') ? 'has-error' : ''}}">
                                {!! Form::label('formato', 'Formato', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('formato', ['XML' => 'Formato XML (Itaperuna)', 'CSV' => 'CSV (Padrão SLACS)'], null, ['class' => 'form-control', 'required' => 'required']) !!}
                                    {!! $errors->first('formato', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('arquivo') ? 'has-error' : ''}}">
                                {!! Form::label('arquivo', 'Arquivo', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::file('arquivo', ['required' => 'required']) !!}
                                    {!! $errors->first('arquivo', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    {!! Form::submit('Importar', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
