<div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
    {!! Form::label('nome', 'Nome', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nome', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('municipio') ? 'has-error' : ''}}">
    {!! Form::label('municipio', 'Municipio', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('municipio', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('municipio', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('link_transparencia') ? 'has-error' : ''}}">
    {!! Form::label('link_transparencia', 'Link Transparencia', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('link_transparencia', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('link_transparencia', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('link_licitacoes') ? 'has-error' : ''}}">
    {!! Form::label('link_licitacoes', 'Link Licitacoes', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('link_licitacoes', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('link_licitacoes', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('link_contratos') ? 'has-error' : ''}}">
    {!! Form::label('link_contratos', 'Link Contratos', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('link_contratos', null, ['class' => 'form-control']) !!}
        {!! $errors->first('link_contratos', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('esfera') ? 'has-error' : ''}}">
    {!! Form::label('esfera', 'Esfera', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('esfera', ['Municipal', 'Estadual', 'Federal'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('esfera', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('classificacao') ? 'has-error' : ''}}">
    {!! Form::label('classificacao', 'Classificacao', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('classificacao', [1 => "1ª Classificação", 2 => '2ª Classificação', 3 => '3ª Classificação',4=> '4ª Classificação'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('classificacao', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('ativo') ? 'has-error' : ''}}">
    {!! Form::label('ativo', 'Ativo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('ativo', [1 => 'Ativo', 0 => 'Inativo'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('ativo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Cadastrar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
