<div class="form-group {{ $errors->has('descricao') ? 'has-error' : ''}}">
    {!! Form::label('descricao', 'Descricao', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('descricao', null, ['class' => 'form-control']) !!}
        {!! $errors->first('descricao', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('quantidade') ? 'has-error' : ''}}">
    {!! Form::label('quantidade', 'Quantidade', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('quantidade', null, ['class' => 'form-control']) !!}
        {!! $errors->first('quantidade', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('unidade_medida') ? 'has-error' : ''}}">
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
</div><div class="form-group {{ $errors->has('valor_proposta_vencedora') ? 'has-error' : ''}}">
    {!! Form::label('valor_proposta_vencedora', 'Valor Proposta Vencedora', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('valor_proposta_vencedora', null, ['class' => 'real form-control']) !!}
        {!! $errors->first('valor_proposta_vencedora', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('valor_total') ? 'has-error' : ''}}">
    {!! Form::label('valor_total', 'Valor Total', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('valor_total', null, ['class' => 'real form-control']) !!}
        {!! $errors->first('valor_total', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('tipo_pessoa', 'Tipo de Pessoa', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        
        <div class="radio">
            <label for="">
            {!! Form::radio('tipo_pessoa', 'juridica', true) !!}    
            Pessoa Jurídica
            </label>
        </div>    
        <div class="radio">
            <label for="">{!! Form::radio('tipo_pessoa', 'fisica', false) !!} 
            Pessosa Física
            </label>        
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('cnpj_cpf') ? 'has-error' : ''}}">
    {!! Form::label('cnpj_cpf', 'CNPJ/CPF', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('cnpj_cpf', null, ['class' => 'form-control','id' =>'cpf']) !!}
        {!! $errors->first('cnpj_cpf', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Cadastrar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
<script>
    $(document).ready(function() {
        // $("#div_pessoa_fisica").hide();

        $("#cpf").inputmask("999.999.999-99");
        $("#cnpj").inputmask("99.999.999/9999-99");

        // $("input[type=radio][name=tipo_pessoa]").change(function (){
        //     var valor = this.value;
        //     if (valor == "fisica") {
        //         $("#cpf").attr("required", "true");
        //         $("#cnpj").removeAttr("required");
        //         $("#cnpj").removeAttr("value");
        //         $("#div_pessoa_fisica").show();
        //         $("#div_pessoa_juridica").hide();
        //     }
        //     else{
        //         $("#cpf").removeAttr("required");
        //         $("#cpf").removeAttr("value");
        //         $("#cnpj").attr("required", "true");
        //         $("#div_pessoa_fisica").hide();
        //         $("#div_pessoa_juridica").show();
        //     }
        // });
    });
</script>