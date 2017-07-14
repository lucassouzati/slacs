<div class="form-group {{ $errors->has('ente_id') ? 'has-error' : ''}}">
    {!! Form::label('ente_id', 'Ente Público', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('ente_id', $entes->pluck('nome', 'id')->prepend("", ""), null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('ente_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('unidade_gestora') ? 'has-error' : ''}}">
    {!! Form::label('unidade_gestora', 'Unidade Gestora', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('unidade_gestora', null, ['class' => 'form-control']) !!}
        {!! $errors->first('unidade_gestora', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('data_emissao') ? 'has-error' : ''}}">
    {!! Form::label('data_emissao', 'Data Emissao', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('data_emissao', null, ['class' => 'data form-control', 'required' => 'required']) !!}
        {!! $errors->first('data_emissao', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('data_expiracao') ? 'has-error' : ''}}">
    {!! Form::label('data_expiracao', 'Data Expiracao', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('data_expiracao', null, ['class' => 'data form-control']) !!}
        {!! $errors->first('data_expiracao', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('instrumento_contrato') ? 'has-error' : ''}}">
    {!! Form::label('instrumento_contrato', 'Instrumento Contrato', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('instrumento_contrato', null, ['class' => 'form-control']) !!}
        {!! $errors->first('instrumento_contrato', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('numero_contrato') ? 'has-error' : ''}}">
    {!! Form::label('numero_contrato', 'Numero Contrato', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('numero_contrato', null, ['class' => 'form-control']) !!}
        {!! $errors->first('numero_contrato', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
    {!! Form::label('tipo', 'Tipo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('tipo', null, ['class' => 'form-control']) !!}
        {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fornecedor') ? 'has-error' : ''}}">
    {!! Form::label('fornecedor', 'Fornecedor', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('fornecedor', null, ['class' => 'form-control']) !!}
        {!! $errors->first('fornecedor', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cnpj_cpf') ? 'has-error' : ''}}">
    {!! Form::label('cnpj_cpf', 'Cnpj Cpf', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('cnpj_cpf', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('cnpj_cpf', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('teve_aditivo') ? 'has-error' : ''}}">
    {!! Form::label('teve_aditivo', 'Teve Aditivo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
    <label>{!! Form::radio('teve_aditivo', '1') !!} Yes</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('teve_aditivo', '0', true) !!} No</label>
</div>
        {!! $errors->first('teve_aditivo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('processo') ? 'has-error' : ''}}">
    {!! Form::label('processo', 'Processo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('processo', null, ['class' => 'form-control']) !!}
        {!! $errors->first('processo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('valor') ? 'has-error' : ''}}">
    {!! Form::label('valor', 'Valor', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('valor', null, ['class' => 'real form-control']) !!}
        {!! $errors->first('valor', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('descricao') ? 'has-error' : ''}}">
    {!! Form::label('descricao', 'Descricao', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}
        {!! $errors->first('descricao', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('licitacao_id') ? 'has-error' : ''}}">
    {!! Form::label('licitacao_id', 'Licitação', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('licitacao_id', $licitacoes->pluck('nome', 'id')->prepend("", ""), null, ['class' => 'form-control',]) !!}
        {!! $errors->first('licitacao_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('numero_licitacao') ? 'has-error' : ''}}">
    {!! Form::label('numero_licitacao', 'Número da Licitação/Ano', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('numero_licitacao', null, ['class' => 'form-control']) !!}
        {!! $errors->first('numero_licitacao', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Cadastrar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
