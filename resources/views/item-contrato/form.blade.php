<div class="form-group {{ $errors->has('exercicio') ? 'has-error' : ''}}">
    {!! Form::label('exercicio', 'Exercicio', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('exercicio', null, ['class' => 'form-control']) !!}
        {!! $errors->first('exercicio', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('descricao') ? 'has-error' : ''}}">
    {!! Form::label('descricao', 'Descricao', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}
        {!! $errors->first('descricao', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('quantidade') ? 'has-error' : ''}}">
    {!! Form::label('quantidade', 'Quantidade', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('quantidade', null, ['class' => 'form-control']) !!}
        {!! $errors->first('quantidade', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('unidade_medida') ? 'has-error' : ''}}">
    {!! Form::label('unidade_medida', 'Unidade Medida', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('unidade_medida', null, ['class' => 'form-control']) !!}
        {!! $errors->first('unidade_medida', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('valor_unitario') ? 'has-error' : ''}}">
    {!! Form::label('valor_unitario', 'Valor Unitario', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('valor_unitario', null, ['class' => 'real form-control']) !!}
        {!! $errors->first('valor_unitario', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('valor_total') ? 'has-error' : ''}}">
    {!! Form::label('valor_total', 'Valor Total', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('valor_total', null, ['class' => 'real form-control']) !!}
        {!! $errors->first('valor_total', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Cadastrar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
