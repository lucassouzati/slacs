<div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
    {!! Form::label('nome', 'Nome', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nome', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cidade') ? 'has-error' : ''}}">
    {!! Form::label('cidade', 'Cidade', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('cidade', null, ['class' => 'form-control']) !!}
        {!! $errors->first('cidade', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('password', ['class' => 'form-control']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ativo') ? 'has-error' : ''}}">
    {!! Form::label('ativo', 'Ativo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
    <label>{!! Form::radio('ativo', '1') !!} Yes</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('ativo', '0', true) !!} No</label>
</div>
        {!! $errors->first('ativo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Cadastrar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
