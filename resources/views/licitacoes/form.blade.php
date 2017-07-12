<div class="form-group {{ $errors->has('unidade_gestora') ? 'has-error' : ''}}">
    {!! Form::label('unidade_gestora', 'Unidade Gestora', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('unidade_gestora', null, ['class' => 'form-control','required' => 'required']) !!}
        {!! $errors->first('unidade_gestora', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('num_proc') ? 'has-error' : ''}}">
    {!! Form::label('num_proc', 'Número do processo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('num_proc', null, ['class' => 'form-control','required' => 'required']) !!}
        {!! $errors->first('num_proc', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('modalidade') ? 'has-error' : ''}}">
    {!! Form::label('modalidade', 'Modalidade', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('modalidade', null, ['class' => 'form-control','required' => 'required']) !!}
        {!! $errors->first('modalidade', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
    {!! Form::label('tipo', 'Tipo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('tipo', null, ['class' => 'form-control','required' => 'required']) !!}
        {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('situacao') ? 'has-error' : ''}}">
    {!! Form::label('situacao', 'Situação da licitação', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('situacao', null, ['class' => 'form-control','required' => 'required']) !!}
        {!! $errors->first('situacao', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('data_julgamento') ? 'has-error' : ''}}">
    {!! Form::label('data_julgamento', 'Data de julgamento', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('data_julgamento', null, ['class' => 'data form-control']) !!}
        {!! $errors->first('data_julgamento', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('data_homologacao') ? 'has-error' : ''}}">
    {!! Form::label('data_homologacao', 'Data da homologação', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('data_homologacao', null, ['class' => 'data form-control']) !!}
        {!! $errors->first('data_homologacao', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('objeto') ? 'has-error' : ''}}">
    {!! Form::label('objeto', 'Objeto', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('objeto', null, ['class' => 'form-control']) !!}
        {!! $errors->first('objeto', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('valor') ? 'has-error' : ''}}">
    {!! Form::label('valor', 'Valor', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('valor', null, ['class' => 'real form-control']) !!}
        {!! $errors->first('valor', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('criterio') ? 'has-error' : ''}}">
    {!! Form::label('criterio', 'Criterio', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('criterio', null, ['class' => 'form-control']) !!}
        {!! $errors->first('criterio', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('prazo_execucao') ? 'has-error' : ''}}">
    {!! Form::label('prazo_execucao', 'Prazo Execucao', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('prazo_execucao', null, ['class' => 'form-control']) !!}
        {!! $errors->first('prazo_execucao', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ente_id') ? 'has-error' : ''}}">
    {!! Form::label('ente_id', 'Ente Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('ente_id', $entes->pluck('nome', 'id')->prepend("", ""), null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('ente_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Cadastrar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
