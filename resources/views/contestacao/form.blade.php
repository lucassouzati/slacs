@if($tipo == 'contrato')
<div class="form-group {{ $errors->has('contrato_id') ? 'has-error' : ''}}">
    {!! Form::label('contrato_id', 'Contrato', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('contrato_id', [$contrato->descricao], null, ['class' => 'form-control']) !!}
        {!! $errors->first('contrato_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@else
<div class="form-group {{ $errors->has('licitacao_id') ? 'has-error' : ''}}">
    {!! Form::label('licitacao_id', 'Licitação', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('licitacao_id', [$licitacao->num_proc], null, ['class' => 'form-control']) !!}
        {!! $errors->first('licitacao_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

@endif
<div class="form-group {{ $errors->has('observacao') ? 'has-error' : ''}}">
    {!! Form::label('observacao', 'Observacao', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('observacao', null, ['class' => 'form-control']) !!}
        {!! $errors->first('observacao', '<p class="help-block">:message</p>') !!}
    </div>
</div> 
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Cadastrar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
